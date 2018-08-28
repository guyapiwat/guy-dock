<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAsalehQuery as ChildAliAsalehQuery;
use CciOrm\CciOrm\Map\AliAsalehTableMap;
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
 * Base class that represents a row from the 'ali_asaleh' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliAsaleh implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliAsalehTableMap';


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
     * The value for the pano field.
     *
     * @var        string
     */
    protected $pano;

    /**
     * The value for the sadate field.
     *
     * @var        string
     */
    protected $sadate;

    /**
     * The value for the sctime field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $sctime;

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
     * The value for the sp_code field.
     *
     * @var        string
     */
    protected $sp_code;

    /**
     * The value for the sp_pos field.
     *
     * @var        string
     */
    protected $sp_pos;

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
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the total_vat field.
     *
     * @var        string
     */
    protected $total_vat;

    /**
     * The value for the total_net field.
     *
     * @var        string
     */
    protected $total_net;

    /**
     * The value for the total_invat field.
     *
     * @var        string
     */
    protected $total_invat;

    /**
     * The value for the total_exvat field.
     *
     * @var        string
     */
    protected $total_exvat;

    /**
     * The value for the customer_total field.
     *
     * @var        string
     */
    protected $customer_total;

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
     * The value for the tot_sppv field.
     *
     * @var        string
     */
    protected $tot_sppv;

    /**
     * The value for the tot_weight field.
     *
     * @var        string
     */
    protected $tot_weight;

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
     * The value for the uid_branch field.
     *
     * @var        string
     */
    protected $uid_branch;

    /**
     * The value for the lid field.
     *
     * @var        string
     */
    protected $lid;

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
     * The value for the chkcredit4 field.
     *
     * @var        string
     */
    protected $chkcredit4;

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
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtcash;

    /**
     * The value for the txtfuture field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtfuture;

    /**
     * The value for the txttransfer field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txttransfer;

    /**
     * The value for the ewallet field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the txtcredit1 field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtcredit1;

    /**
     * The value for the txtcredit2 field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtcredit2;

    /**
     * The value for the txtcredit3 field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtcredit3;

    /**
     * The value for the txtcredit4 field.
     *
     * @var        string
     */
    protected $txtcredit4;

    /**
     * The value for the txtinternet field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtinternet;

    /**
     * The value for the txtdiscount field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtdiscount;

    /**
     * The value for the txtother field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtother;

    /**
     * The value for the txtsending field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $txtsending;

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
     * The value for the optioncredit4 field.
     *
     * @var        string
     */
    protected $optioncredit4;

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
     * The value for the ipay field.
     *
     * @var        string
     */
    protected $ipay;

    /**
     * The value for the pay_type field.
     *
     * @var        string
     */
    protected $pay_type;

    /**
     * The value for the hcancel field.
     *
     * @var        int
     */
    protected $hcancel;

    /**
     * The value for the caddress field.
     *
     * @var        string
     */
    protected $caddress;

    /**
     * The value for the cdistrictid field.
     *
     * @var        string
     */
    protected $cdistrictid;

    /**
     * The value for the camphurid field.
     *
     * @var        string
     */
    protected $camphurid;

    /**
     * The value for the cprovinceid field.
     *
     * @var        string
     */
    protected $cprovinceid;

    /**
     * The value for the czip field.
     *
     * @var        string
     */
    protected $czip;

    /**
     * The value for the sender field.
     *
     * @var        int
     */
    protected $sender;

    /**
     * The value for the sender_date field.
     *
     * @var        DateTime
     */
    protected $sender_date;

    /**
     * The value for the receive field.
     *
     * @var        int
     */
    protected $receive;

    /**
     * The value for the receive_date field.
     *
     * @var        DateTime
     */
    protected $receive_date;

    /**
     * The value for the asend field.
     *
     * @var        int
     */
    protected $asend;

    /**
     * The value for the ato_type field.
     *
     * @var        int
     */
    protected $ato_type;

    /**
     * The value for the ato_id field.
     *
     * @var        int
     */
    protected $ato_id;

    /**
     * The value for the online field.
     *
     * @var        int
     */
    protected $online;

    /**
     * The value for the hpv field.
     *
     * @var        string
     */
    protected $hpv;

    /**
     * The value for the htotal field.
     *
     * @var        string
     */
    protected $htotal;

    /**
     * The value for the hdate field.
     *
     * @var        DateTime
     */
    protected $hdate;

    /**
     * The value for the scheck field.
     *
     * @var        string
     */
    protected $scheck;

    /**
     * The value for the checkportal field.
     *
     * @var        int
     */
    protected $checkportal;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the bmcauto field.
     *
     * @var        int
     */
    protected $bmcauto;

    /**
     * The value for the cancel_date field.
     *
     * Note: this column has a database default value of: NULL
     * @var        DateTime
     */
    protected $cancel_date;

    /**
     * The value for the uid_cancel field.
     *
     * @var        string
     */
    protected $uid_cancel;

    /**
     * The value for the cname field.
     *
     * @var        string
     */
    protected $cname;

    /**
     * The value for the cmobile field.
     *
     * @var        string
     */
    protected $cmobile;

    /**
     * The value for the uid_sender field.
     *
     * @var        string
     */
    protected $uid_sender;

    /**
     * The value for the uid_receive field.
     *
     * @var        string
     */
    protected $uid_receive;

    /**
     * The value for the mbase field.
     *
     * @var        string
     */
    protected $mbase;

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
     * The value for the crate field.
     *
     * @var        string
     */
    protected $crate;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * The value for the ref field.
     *
     * @var        string
     */
    protected $ref;

    /**
     * The value for the selectcash field.
     *
     * @var        string
     */
    protected $selectcash;

    /**
     * The value for the selecttransfer field.
     *
     * @var        string
     */
    protected $selecttransfer;

    /**
     * The value for the selectcredit1 field.
     *
     * @var        string
     */
    protected $selectcredit1;

    /**
     * The value for the selectcredit2 field.
     *
     * @var        string
     */
    protected $selectcredit2;

    /**
     * The value for the selectcredit3 field.
     *
     * @var        string
     */
    protected $selectcredit3;

    /**
     * The value for the selectdiscount field.
     *
     * @var        string
     */
    protected $selectdiscount;

    /**
     * The value for the selectinternet field.
     *
     * @var        string
     */
    protected $selectinternet;

    /**
     * The value for the txtvoucher field.
     *
     * @var        string
     */
    protected $txtvoucher;

    /**
     * The value for the optionvoucher field.
     *
     * @var        string
     */
    protected $optionvoucher;

    /**
     * The value for the selectvoucher field.
     *
     * @var        string
     */
    protected $selectvoucher;

    /**
     * The value for the txttransfer1 field.
     *
     * @var        string
     */
    protected $txttransfer1;

    /**
     * The value for the optiontransfer1 field.
     *
     * @var        string
     */
    protected $optiontransfer1;

    /**
     * The value for the selecttransfer1 field.
     *
     * @var        string
     */
    protected $selecttransfer1;

    /**
     * The value for the txttransfer2 field.
     *
     * @var        string
     */
    protected $txttransfer2;

    /**
     * The value for the optiontransfer2 field.
     *
     * @var        string
     */
    protected $optiontransfer2;

    /**
     * The value for the selecttransfer2 field.
     *
     * @var        string
     */
    protected $selecttransfer2;

    /**
     * The value for the txttransfer3 field.
     *
     * @var        string
     */
    protected $txttransfer3;

    /**
     * The value for the optiontransfer3 field.
     *
     * @var        string
     */
    protected $optiontransfer3;

    /**
     * The value for the selecttransfer3 field.
     *
     * @var        string
     */
    protected $selecttransfer3;

    /**
     * The value for the status_package field.
     *
     * @var        int
     */
    protected $status_package;

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
        $this->txtcash = '0.00';
        $this->txtfuture = '0.00';
        $this->txttransfer = '0.00';
        $this->ewallet = '0.00';
        $this->txtcredit1 = '0.00';
        $this->txtcredit2 = '0.00';
        $this->txtcredit3 = '0.00';
        $this->txtinternet = '0.00';
        $this->txtdiscount = '0.00';
        $this->txtother = '0.00';
        $this->txtsending = '0.00';
        $this->cancel_date = PropelDateTime::newInstance(NULL, null, 'DateTime');
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliAsaleh object.
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
     * Compares this with another <code>AliAsaleh</code> instance.  If
     * <code>obj</code> is an instance of <code>AliAsaleh</code>, delegates to
     * <code>equals(AliAsaleh)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliAsaleh The current object, for fluid interface
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
     * Get the [pano] column value.
     *
     * @return string
     */
    public function getPano()
    {
        return $this->pano;
    }

    /**
     * Get the [sadate] column value.
     *
     * @return string
     */
    public function getSadate()
    {
        return $this->sadate;
    }

    /**
     * Get the [optionally formatted] temporal [sctime] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSctime($format = NULL)
    {
        if ($format === null) {
            return $this->sctime;
        } else {
            return $this->sctime instanceof \DateTimeInterface ? $this->sctime->format($format) : null;
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
     * Get the [sp_code] column value.
     *
     * @return string
     */
    public function getSpCode()
    {
        return $this->sp_code;
    }

    /**
     * Get the [sp_pos] column value.
     *
     * @return string
     */
    public function getSpPos()
    {
        return $this->sp_pos;
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
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [total_vat] column value.
     *
     * @return string
     */
    public function getTotalVat()
    {
        return $this->total_vat;
    }

    /**
     * Get the [total_net] column value.
     *
     * @return string
     */
    public function getTotalNet()
    {
        return $this->total_net;
    }

    /**
     * Get the [total_invat] column value.
     *
     * @return string
     */
    public function getTotalInvat()
    {
        return $this->total_invat;
    }

    /**
     * Get the [total_exvat] column value.
     *
     * @return string
     */
    public function getTotalExvat()
    {
        return $this->total_exvat;
    }

    /**
     * Get the [customer_total] column value.
     *
     * @return string
     */
    public function getCustomerTotal()
    {
        return $this->customer_total;
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
     * Get the [tot_sppv] column value.
     *
     * @return string
     */
    public function getTotSppv()
    {
        return $this->tot_sppv;
    }

    /**
     * Get the [tot_weight] column value.
     *
     * @return string
     */
    public function getTotWeight()
    {
        return $this->tot_weight;
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
     * Get the [uid_branch] column value.
     *
     * @return string
     */
    public function getUidBranch()
    {
        return $this->uid_branch;
    }

    /**
     * Get the [lid] column value.
     *
     * @return string
     */
    public function getLid()
    {
        return $this->lid;
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
     * Get the [chkcredit4] column value.
     *
     * @return string
     */
    public function getChkcredit4()
    {
        return $this->chkcredit4;
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
     * Get the [txtcredit4] column value.
     *
     * @return string
     */
    public function getTxtcredit4()
    {
        return $this->txtcredit4;
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
     * Get the [txtsending] column value.
     *
     * @return string
     */
    public function getTxtsending()
    {
        return $this->txtsending;
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
     * Get the [optioncredit4] column value.
     *
     * @return string
     */
    public function getOptioncredit4()
    {
        return $this->optioncredit4;
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
     * Get the [ipay] column value.
     *
     * @return string
     */
    public function getIpay()
    {
        return $this->ipay;
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
     * Get the [hcancel] column value.
     *
     * @return int
     */
    public function getHcancel()
    {
        return $this->hcancel;
    }

    /**
     * Get the [caddress] column value.
     *
     * @return string
     */
    public function getCaddress()
    {
        return $this->caddress;
    }

    /**
     * Get the [cdistrictid] column value.
     *
     * @return string
     */
    public function getCdistrictid()
    {
        return $this->cdistrictid;
    }

    /**
     * Get the [camphurid] column value.
     *
     * @return string
     */
    public function getCamphurid()
    {
        return $this->camphurid;
    }

    /**
     * Get the [cprovinceid] column value.
     *
     * @return string
     */
    public function getCprovinceid()
    {
        return $this->cprovinceid;
    }

    /**
     * Get the [czip] column value.
     *
     * @return string
     */
    public function getCzip()
    {
        return $this->czip;
    }

    /**
     * Get the [sender] column value.
     *
     * @return int
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Get the [optionally formatted] temporal [sender_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSenderDate($format = NULL)
    {
        if ($format === null) {
            return $this->sender_date;
        } else {
            return $this->sender_date instanceof \DateTimeInterface ? $this->sender_date->format($format) : null;
        }
    }

    /**
     * Get the [receive] column value.
     *
     * @return int
     */
    public function getReceive()
    {
        return $this->receive;
    }

    /**
     * Get the [optionally formatted] temporal [receive_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getReceiveDate($format = NULL)
    {
        if ($format === null) {
            return $this->receive_date;
        } else {
            return $this->receive_date instanceof \DateTimeInterface ? $this->receive_date->format($format) : null;
        }
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
     * Get the [ato_type] column value.
     *
     * @return int
     */
    public function getAtoType()
    {
        return $this->ato_type;
    }

    /**
     * Get the [ato_id] column value.
     *
     * @return int
     */
    public function getAtoId()
    {
        return $this->ato_id;
    }

    /**
     * Get the [online] column value.
     *
     * @return int
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Get the [hpv] column value.
     *
     * @return string
     */
    public function getHpv()
    {
        return $this->hpv;
    }

    /**
     * Get the [htotal] column value.
     *
     * @return string
     */
    public function getHtotal()
    {
        return $this->htotal;
    }

    /**
     * Get the [optionally formatted] temporal [hdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHdate($format = NULL)
    {
        if ($format === null) {
            return $this->hdate;
        } else {
            return $this->hdate instanceof \DateTimeInterface ? $this->hdate->format($format) : null;
        }
    }

    /**
     * Get the [scheck] column value.
     *
     * @return string
     */
    public function getScheck()
    {
        return $this->scheck;
    }

    /**
     * Get the [checkportal] column value.
     *
     * @return int
     */
    public function getCheckportal()
    {
        return $this->checkportal;
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
     * Get the [bmcauto] column value.
     *
     * @return int
     */
    public function getBmcauto()
    {
        return $this->bmcauto;
    }

    /**
     * Get the [optionally formatted] temporal [cancel_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCancelDate($format = NULL)
    {
        if ($format === null) {
            return $this->cancel_date;
        } else {
            return $this->cancel_date instanceof \DateTimeInterface ? $this->cancel_date->format($format) : null;
        }
    }

    /**
     * Get the [uid_cancel] column value.
     *
     * @return string
     */
    public function getUidCancel()
    {
        return $this->uid_cancel;
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
     * Get the [cmobile] column value.
     *
     * @return string
     */
    public function getCmobile()
    {
        return $this->cmobile;
    }

    /**
     * Get the [uid_sender] column value.
     *
     * @return string
     */
    public function getUidSender()
    {
        return $this->uid_sender;
    }

    /**
     * Get the [uid_receive] column value.
     *
     * @return string
     */
    public function getUidReceive()
    {
        return $this->uid_receive;
    }

    /**
     * Get the [mbase] column value.
     *
     * @return string
     */
    public function getMbase()
    {
        return $this->mbase;
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
     * Get the [crate] column value.
     *
     * @return string
     */
    public function getCrate()
    {
        return $this->crate;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [ref] column value.
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Get the [selectcash] column value.
     *
     * @return string
     */
    public function getSelectcash()
    {
        return $this->selectcash;
    }

    /**
     * Get the [selecttransfer] column value.
     *
     * @return string
     */
    public function getSelecttransfer()
    {
        return $this->selecttransfer;
    }

    /**
     * Get the [selectcredit1] column value.
     *
     * @return string
     */
    public function getSelectcredit1()
    {
        return $this->selectcredit1;
    }

    /**
     * Get the [selectcredit2] column value.
     *
     * @return string
     */
    public function getSelectcredit2()
    {
        return $this->selectcredit2;
    }

    /**
     * Get the [selectcredit3] column value.
     *
     * @return string
     */
    public function getSelectcredit3()
    {
        return $this->selectcredit3;
    }

    /**
     * Get the [selectdiscount] column value.
     *
     * @return string
     */
    public function getSelectdiscount()
    {
        return $this->selectdiscount;
    }

    /**
     * Get the [selectinternet] column value.
     *
     * @return string
     */
    public function getSelectinternet()
    {
        return $this->selectinternet;
    }

    /**
     * Get the [txtvoucher] column value.
     *
     * @return string
     */
    public function getTxtvoucher()
    {
        return $this->txtvoucher;
    }

    /**
     * Get the [optionvoucher] column value.
     *
     * @return string
     */
    public function getOptionvoucher()
    {
        return $this->optionvoucher;
    }

    /**
     * Get the [selectvoucher] column value.
     *
     * @return string
     */
    public function getSelectvoucher()
    {
        return $this->selectvoucher;
    }

    /**
     * Get the [txttransfer1] column value.
     *
     * @return string
     */
    public function getTxttransfer1()
    {
        return $this->txttransfer1;
    }

    /**
     * Get the [optiontransfer1] column value.
     *
     * @return string
     */
    public function getOptiontransfer1()
    {
        return $this->optiontransfer1;
    }

    /**
     * Get the [selecttransfer1] column value.
     *
     * @return string
     */
    public function getSelecttransfer1()
    {
        return $this->selecttransfer1;
    }

    /**
     * Get the [txttransfer2] column value.
     *
     * @return string
     */
    public function getTxttransfer2()
    {
        return $this->txttransfer2;
    }

    /**
     * Get the [optiontransfer2] column value.
     *
     * @return string
     */
    public function getOptiontransfer2()
    {
        return $this->optiontransfer2;
    }

    /**
     * Get the [selecttransfer2] column value.
     *
     * @return string
     */
    public function getSelecttransfer2()
    {
        return $this->selecttransfer2;
    }

    /**
     * Get the [txttransfer3] column value.
     *
     * @return string
     */
    public function getTxttransfer3()
    {
        return $this->txttransfer3;
    }

    /**
     * Get the [optiontransfer3] column value.
     *
     * @return string
     */
    public function getOptiontransfer3()
    {
        return $this->optiontransfer3;
    }

    /**
     * Get the [selecttransfer3] column value.
     *
     * @return string
     */
    public function getSelecttransfer3()
    {
        return $this->selecttransfer3;
    }

    /**
     * Get the [status_package] column value.
     *
     * @return int
     */
    public function getStatusPackage()
    {
        return $this->status_package;
    }

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [pano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setPano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pano !== $v) {
            $this->pano = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_PANO] = true;
        }

        return $this;
    } // setPano()

    /**
     * Set the value of [sadate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sadate !== $v) {
            $this->sadate = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SADATE] = true;
        }

        return $this;
    } // setSadate()

    /**
     * Sets the value of [sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sctime !== null || $dt !== null) {
            if ($this->sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->sctime->format("Y-m-d H:i:s.u")) {
                $this->sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliAsalehTableMap::COL_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setSctime()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setInvRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_ref !== $v) {
            $this->inv_ref = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_INV_REF] = true;
        }

        return $this;
    } // setInvRef()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [sp_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSpCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_code !== $v) {
            $this->sp_code = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SP_CODE] = true;
        }

        return $this;
    } // setSpCode()

    /**
     * Set the value of [sp_pos] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSpPos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_pos !== $v) {
            $this->sp_pos = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SP_POS] = true;
        }

        return $this;
    } // setSpPos()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [total_vat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotalVat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_vat !== $v) {
            $this->total_vat = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOTAL_VAT] = true;
        }

        return $this;
    } // setTotalVat()

    /**
     * Set the value of [total_net] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotalNet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_net !== $v) {
            $this->total_net = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOTAL_NET] = true;
        }

        return $this;
    } // setTotalNet()

    /**
     * Set the value of [total_invat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotalInvat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_invat !== $v) {
            $this->total_invat = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOTAL_INVAT] = true;
        }

        return $this;
    } // setTotalInvat()

    /**
     * Set the value of [total_exvat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotalExvat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_exvat !== $v) {
            $this->total_exvat = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOTAL_EXVAT] = true;
        }

        return $this;
    } // setTotalExvat()

    /**
     * Set the value of [customer_total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCustomerTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customer_total !== $v) {
            $this->customer_total = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CUSTOMER_TOTAL] = true;
        }

        return $this;
    } // setCustomerTotal()

    /**
     * Set the value of [tot_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_pv !== $v) {
            $this->tot_pv = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOT_PV] = true;
        }

        return $this;
    } // setTotPv()

    /**
     * Set the value of [tot_bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_bv !== $v) {
            $this->tot_bv = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOT_BV] = true;
        }

        return $this;
    } // setTotBv()

    /**
     * Set the value of [tot_fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_fv !== $v) {
            $this->tot_fv = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOT_FV] = true;
        }

        return $this;
    } // setTotFv()

    /**
     * Set the value of [tot_sppv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotSppv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_sppv !== $v) {
            $this->tot_sppv = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOT_SPPV] = true;
        }

        return $this;
    } // setTotSppv()

    /**
     * Set the value of [tot_weight] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTotWeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_weight !== $v) {
            $this->tot_weight = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TOT_WEIGHT] = true;
        }

        return $this;
    } // setTotWeight()

    /**
     * Set the value of [usercode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setUsercode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usercode !== $v) {
            $this->usercode = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_USERCODE] = true;
        }

        return $this;
    } // setUsercode()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Set the value of [trnf] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTrnf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trnf !== $v) {
            $this->trnf = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TRNF] = true;
        }

        return $this;
    } // setTrnf()

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [uid_branch] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setUidBranch($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_branch !== $v) {
            $this->uid_branch = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_UID_BRANCH] = true;
        }

        return $this;
    } // setUidBranch()

    /**
     * Set the value of [lid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setLid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lid !== $v) {
            $this->lid = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_LID] = true;
        }

        return $this;
    } // setLid()

    /**
     * Set the value of [dl] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setDl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dl !== $v) {
            $this->dl = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_DL] = true;
        }

        return $this;
    } // setDl()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [send] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->send !== $v) {
            $this->send = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SEND] = true;
        }

        return $this;
    } // setSend()

    /**
     * Set the value of [txtoption] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtoption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtoption !== $v) {
            $this->txtoption = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTOPTION] = true;
        }

        return $this;
    } // setTxtoption()

    /**
     * Set the value of [chkcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcash !== $v) {
            $this->chkcash = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKCASH] = true;
        }

        return $this;
    } // setChkcash()

    /**
     * Set the value of [chkfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkfuture !== $v) {
            $this->chkfuture = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKFUTURE] = true;
        }

        return $this;
    } // setChkfuture()

    /**
     * Set the value of [chktransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChktransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chktransfer !== $v) {
            $this->chktransfer = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKTRANSFER] = true;
        }

        return $this;
    } // setChktransfer()

    /**
     * Set the value of [chkcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit1 !== $v) {
            $this->chkcredit1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKCREDIT1] = true;
        }

        return $this;
    } // setChkcredit1()

    /**
     * Set the value of [chkcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit2 !== $v) {
            $this->chkcredit2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKCREDIT2] = true;
        }

        return $this;
    } // setChkcredit2()

    /**
     * Set the value of [chkcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit3 !== $v) {
            $this->chkcredit3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKCREDIT3] = true;
        }

        return $this;
    } // setChkcredit3()

    /**
     * Set the value of [chkcredit4] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkcredit4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit4 !== $v) {
            $this->chkcredit4 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKCREDIT4] = true;
        }

        return $this;
    } // setChkcredit4()

    /**
     * Set the value of [chkinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkinternet !== $v) {
            $this->chkinternet = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKINTERNET] = true;
        }

        return $this;
    } // setChkinternet()

    /**
     * Set the value of [chkdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkdiscount !== $v) {
            $this->chkdiscount = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKDISCOUNT] = true;
        }

        return $this;
    } // setChkdiscount()

    /**
     * Set the value of [chkother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setChkother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkother !== $v) {
            $this->chkother = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHKOTHER] = true;
        }

        return $this;
    } // setChkother()

    /**
     * Set the value of [txtcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcash !== $v) {
            $this->txtcash = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTCASH] = true;
        }

        return $this;
    } // setTxtcash()

    /**
     * Set the value of [txtfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtfuture !== $v) {
            $this->txtfuture = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTFUTURE] = true;
        }

        return $this;
    } // setTxtfuture()

    /**
     * Set the value of [txttransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxttransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer !== $v) {
            $this->txttransfer = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTTRANSFER] = true;
        }

        return $this;
    } // setTxttransfer()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [txtcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit1 !== $v) {
            $this->txtcredit1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTCREDIT1] = true;
        }

        return $this;
    } // setTxtcredit1()

    /**
     * Set the value of [txtcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit2 !== $v) {
            $this->txtcredit2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTCREDIT2] = true;
        }

        return $this;
    } // setTxtcredit2()

    /**
     * Set the value of [txtcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit3 !== $v) {
            $this->txtcredit3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTCREDIT3] = true;
        }

        return $this;
    } // setTxtcredit3()

    /**
     * Set the value of [txtcredit4] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtcredit4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit4 !== $v) {
            $this->txtcredit4 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTCREDIT4] = true;
        }

        return $this;
    } // setTxtcredit4()

    /**
     * Set the value of [txtinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtinternet !== $v) {
            $this->txtinternet = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTINTERNET] = true;
        }

        return $this;
    } // setTxtinternet()

    /**
     * Set the value of [txtdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtdiscount !== $v) {
            $this->txtdiscount = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTDISCOUNT] = true;
        }

        return $this;
    } // setTxtdiscount()

    /**
     * Set the value of [txtother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtother !== $v) {
            $this->txtother = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTOTHER] = true;
        }

        return $this;
    } // setTxtother()

    /**
     * Set the value of [txtsending] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtsending($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtsending !== $v) {
            $this->txtsending = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTSENDING] = true;
        }

        return $this;
    } // setTxtsending()

    /**
     * Set the value of [optioncash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptioncash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncash !== $v) {
            $this->optioncash = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONCASH] = true;
        }

        return $this;
    } // setOptioncash()

    /**
     * Set the value of [optionfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptionfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionfuture !== $v) {
            $this->optionfuture = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONFUTURE] = true;
        }

        return $this;
    } // setOptionfuture()

    /**
     * Set the value of [optiontransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptiontransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer !== $v) {
            $this->optiontransfer = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONTRANSFER] = true;
        }

        return $this;
    } // setOptiontransfer()

    /**
     * Set the value of [optioncredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptioncredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit1 !== $v) {
            $this->optioncredit1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONCREDIT1] = true;
        }

        return $this;
    } // setOptioncredit1()

    /**
     * Set the value of [optioncredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptioncredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit2 !== $v) {
            $this->optioncredit2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONCREDIT2] = true;
        }

        return $this;
    } // setOptioncredit2()

    /**
     * Set the value of [optioncredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptioncredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit3 !== $v) {
            $this->optioncredit3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONCREDIT3] = true;
        }

        return $this;
    } // setOptioncredit3()

    /**
     * Set the value of [optioncredit4] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptioncredit4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit4 !== $v) {
            $this->optioncredit4 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONCREDIT4] = true;
        }

        return $this;
    } // setOptioncredit4()

    /**
     * Set the value of [optioninternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptioninternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioninternet !== $v) {
            $this->optioninternet = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONINTERNET] = true;
        }

        return $this;
    } // setOptioninternet()

    /**
     * Set the value of [optiondiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptiondiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiondiscount !== $v) {
            $this->optiondiscount = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONDISCOUNT] = true;
        }

        return $this;
    } // setOptiondiscount()

    /**
     * Set the value of [optionother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptionother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionother !== $v) {
            $this->optionother = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONOTHER] = true;
        }

        return $this;
    } // setOptionother()

    /**
     * Set the value of [discount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setDiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discount !== $v) {
            $this->discount = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_DISCOUNT] = true;
        }

        return $this;
    } // setDiscount()

    /**
     * Set the value of [print] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setPrint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->print !== $v) {
            $this->print = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_PRINT] = true;
        }

        return $this;
    } // setPrint()

    /**
     * Set the value of [ewallet_before] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setEwalletBefore($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_before !== $v) {
            $this->ewallet_before = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_EWALLET_BEFORE] = true;
        }

        return $this;
    } // setEwalletBefore()

    /**
     * Set the value of [ewallet_after] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setEwalletAfter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_after !== $v) {
            $this->ewallet_after = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_EWALLET_AFTER] = true;
        }

        return $this;
    } // setEwalletAfter()

    /**
     * Set the value of [ipay] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setIpay($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ipay !== $v) {
            $this->ipay = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_IPAY] = true;
        }

        return $this;
    } // setIpay()

    /**
     * Set the value of [pay_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setPayType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pay_type !== $v) {
            $this->pay_type = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_PAY_TYPE] = true;
        }

        return $this;
    } // setPayType()

    /**
     * Set the value of [hcancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setHcancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->hcancel !== $v) {
            $this->hcancel = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_HCANCEL] = true;
        }

        return $this;
    } // setHcancel()

    /**
     * Set the value of [caddress] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caddress !== $v) {
            $this->caddress = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CADDRESS] = true;
        }

        return $this;
    } // setCaddress()

    /**
     * Set the value of [cdistrictid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCdistrictid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cdistrictid !== $v) {
            $this->cdistrictid = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CDISTRICTID] = true;
        }

        return $this;
    } // setCdistrictid()

    /**
     * Set the value of [camphurid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCamphurid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->camphurid !== $v) {
            $this->camphurid = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CAMPHURID] = true;
        }

        return $this;
    } // setCamphurid()

    /**
     * Set the value of [cprovinceid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCprovinceid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cprovinceid !== $v) {
            $this->cprovinceid = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CPROVINCEID] = true;
        }

        return $this;
    } // setCprovinceid()

    /**
     * Set the value of [czip] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->czip !== $v) {
            $this->czip = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CZIP] = true;
        }

        return $this;
    } // setCzip()

    /**
     * Set the value of [sender] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSender($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sender !== $v) {
            $this->sender = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SENDER] = true;
        }

        return $this;
    } // setSender()

    /**
     * Sets the value of [sender_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSenderDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sender_date !== null || $dt !== null) {
            if ($this->sender_date === null || $dt === null || $dt->format("Y-m-d") !== $this->sender_date->format("Y-m-d")) {
                $this->sender_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliAsalehTableMap::COL_SENDER_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSenderDate()

    /**
     * Set the value of [receive] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setReceive($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->receive !== $v) {
            $this->receive = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_RECEIVE] = true;
        }

        return $this;
    } // setReceive()

    /**
     * Sets the value of [receive_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setReceiveDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->receive_date !== null || $dt !== null) {
            if ($this->receive_date === null || $dt === null || $dt->format("Y-m-d") !== $this->receive_date->format("Y-m-d")) {
                $this->receive_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliAsalehTableMap::COL_RECEIVE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setReceiveDate()

    /**
     * Set the value of [asend] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setAsend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->asend !== $v) {
            $this->asend = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_ASEND] = true;
        }

        return $this;
    } // setAsend()

    /**
     * Set the value of [ato_type] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setAtoType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ato_type !== $v) {
            $this->ato_type = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_ATO_TYPE] = true;
        }

        return $this;
    } // setAtoType()

    /**
     * Set the value of [ato_id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setAtoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ato_id !== $v) {
            $this->ato_id = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_ATO_ID] = true;
        }

        return $this;
    } // setAtoId()

    /**
     * Set the value of [online] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOnline($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->online !== $v) {
            $this->online = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_ONLINE] = true;
        }

        return $this;
    } // setOnline()

    /**
     * Set the value of [hpv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setHpv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hpv !== $v) {
            $this->hpv = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_HPV] = true;
        }

        return $this;
    } // setHpv()

    /**
     * Set the value of [htotal] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setHtotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->htotal !== $v) {
            $this->htotal = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_HTOTAL] = true;
        }

        return $this;
    } // setHtotal()

    /**
     * Sets the value of [hdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setHdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->hdate !== null || $dt !== null) {
            if ($this->hdate === null || $dt === null || $dt->format("Y-m-d") !== $this->hdate->format("Y-m-d")) {
                $this->hdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliAsalehTableMap::COL_HDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setHdate()

    /**
     * Set the value of [scheck] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setScheck($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->scheck !== $v) {
            $this->scheck = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SCHECK] = true;
        }

        return $this;
    } // setScheck()

    /**
     * Set the value of [checkportal] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCheckportal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->checkportal !== $v) {
            $this->checkportal = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CHECKPORTAL] = true;
        }

        return $this;
    } // setCheckportal()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [bmcauto] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setBmcauto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bmcauto !== $v) {
            $this->bmcauto = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_BMCAUTO] = true;
        }

        return $this;
    } // setBmcauto()

    /**
     * Sets the value of [cancel_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCancelDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->cancel_date !== null || $dt !== null) {
            if ( ($dt != $this->cancel_date) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s.u') === NULL) // or the entered value matches the default
                 ) {
                $this->cancel_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliAsalehTableMap::COL_CANCEL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCancelDate()

    /**
     * Set the value of [uid_cancel] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setUidCancel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_cancel !== $v) {
            $this->uid_cancel = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_UID_CANCEL] = true;
        }

        return $this;
    } // setUidCancel()

    /**
     * Set the value of [cname] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cname !== $v) {
            $this->cname = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CNAME] = true;
        }

        return $this;
    } // setCname()

    /**
     * Set the value of [cmobile] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCmobile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cmobile !== $v) {
            $this->cmobile = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CMOBILE] = true;
        }

        return $this;
    } // setCmobile()

    /**
     * Set the value of [uid_sender] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setUidSender($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_sender !== $v) {
            $this->uid_sender = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_UID_SENDER] = true;
        }

        return $this;
    } // setUidSender()

    /**
     * Set the value of [uid_receive] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setUidReceive($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_receive !== $v) {
            $this->uid_receive = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_UID_RECEIVE] = true;
        }

        return $this;
    } // setUidReceive()

    /**
     * Set the value of [mbase] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setMbase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mbase !== $v) {
            $this->mbase = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_MBASE] = true;
        }

        return $this;
    } // setMbase()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ref !== $v) {
            $this->ref = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_REF] = true;
        }

        return $this;
    } // setRef()

    /**
     * Set the value of [selectcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectcash !== $v) {
            $this->selectcash = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTCASH] = true;
        }

        return $this;
    } // setSelectcash()

    /**
     * Set the value of [selecttransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelecttransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selecttransfer !== $v) {
            $this->selecttransfer = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTTRANSFER] = true;
        }

        return $this;
    } // setSelecttransfer()

    /**
     * Set the value of [selectcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectcredit1 !== $v) {
            $this->selectcredit1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTCREDIT1] = true;
        }

        return $this;
    } // setSelectcredit1()

    /**
     * Set the value of [selectcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectcredit2 !== $v) {
            $this->selectcredit2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTCREDIT2] = true;
        }

        return $this;
    } // setSelectcredit2()

    /**
     * Set the value of [selectcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectcredit3 !== $v) {
            $this->selectcredit3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTCREDIT3] = true;
        }

        return $this;
    } // setSelectcredit3()

    /**
     * Set the value of [selectdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectdiscount !== $v) {
            $this->selectdiscount = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTDISCOUNT] = true;
        }

        return $this;
    } // setSelectdiscount()

    /**
     * Set the value of [selectinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectinternet !== $v) {
            $this->selectinternet = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTINTERNET] = true;
        }

        return $this;
    } // setSelectinternet()

    /**
     * Set the value of [txtvoucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxtvoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtvoucher !== $v) {
            $this->txtvoucher = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTVOUCHER] = true;
        }

        return $this;
    } // setTxtvoucher()

    /**
     * Set the value of [optionvoucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptionvoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionvoucher !== $v) {
            $this->optionvoucher = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONVOUCHER] = true;
        }

        return $this;
    } // setOptionvoucher()

    /**
     * Set the value of [selectvoucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelectvoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selectvoucher !== $v) {
            $this->selectvoucher = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTVOUCHER] = true;
        }

        return $this;
    } // setSelectvoucher()

    /**
     * Set the value of [txttransfer1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxttransfer1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer1 !== $v) {
            $this->txttransfer1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTTRANSFER1] = true;
        }

        return $this;
    } // setTxttransfer1()

    /**
     * Set the value of [optiontransfer1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptiontransfer1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer1 !== $v) {
            $this->optiontransfer1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONTRANSFER1] = true;
        }

        return $this;
    } // setOptiontransfer1()

    /**
     * Set the value of [selecttransfer1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelecttransfer1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selecttransfer1 !== $v) {
            $this->selecttransfer1 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTTRANSFER1] = true;
        }

        return $this;
    } // setSelecttransfer1()

    /**
     * Set the value of [txttransfer2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxttransfer2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer2 !== $v) {
            $this->txttransfer2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTTRANSFER2] = true;
        }

        return $this;
    } // setTxttransfer2()

    /**
     * Set the value of [optiontransfer2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptiontransfer2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer2 !== $v) {
            $this->optiontransfer2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONTRANSFER2] = true;
        }

        return $this;
    } // setOptiontransfer2()

    /**
     * Set the value of [selecttransfer2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelecttransfer2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selecttransfer2 !== $v) {
            $this->selecttransfer2 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTTRANSFER2] = true;
        }

        return $this;
    } // setSelecttransfer2()

    /**
     * Set the value of [txttransfer3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setTxttransfer3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer3 !== $v) {
            $this->txttransfer3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_TXTTRANSFER3] = true;
        }

        return $this;
    } // setTxttransfer3()

    /**
     * Set the value of [optiontransfer3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setOptiontransfer3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer3 !== $v) {
            $this->optiontransfer3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_OPTIONTRANSFER3] = true;
        }

        return $this;
    } // setOptiontransfer3()

    /**
     * Set the value of [selecttransfer3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setSelecttransfer3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->selecttransfer3 !== $v) {
            $this->selecttransfer3 = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_SELECTTRANSFER3] = true;
        }

        return $this;
    } // setSelecttransfer3()

    /**
     * Set the value of [status_package] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object (for fluent API support)
     */
    public function setStatusPackage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_package !== $v) {
            $this->status_package = $v;
            $this->modifiedColumns[AliAsalehTableMap::COL_STATUS_PACKAGE] = true;
        }

        return $this;
    } // setStatusPackage()

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

            if ($this->txtcash !== '0.00') {
                return false;
            }

            if ($this->txtfuture !== '0.00') {
                return false;
            }

            if ($this->txttransfer !== '0.00') {
                return false;
            }

            if ($this->ewallet !== '0.00') {
                return false;
            }

            if ($this->txtcredit1 !== '0.00') {
                return false;
            }

            if ($this->txtcredit2 !== '0.00') {
                return false;
            }

            if ($this->txtcredit3 !== '0.00') {
                return false;
            }

            if ($this->txtinternet !== '0.00') {
                return false;
            }

            if ($this->txtdiscount !== '0.00') {
                return false;
            }

            if ($this->txtother !== '0.00') {
                return false;
            }

            if ($this->txtsending !== '0.00') {
                return false;
            }

            if ($this->cancel_date && $this->cancel_date->format('Y-m-d H:i:s.u') !== NULL) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliAsalehTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliAsalehTableMap::translateFieldName('Pano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliAsalehTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sadate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliAsalehTableMap::translateFieldName('Sctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliAsalehTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliAsalehTableMap::translateFieldName('InvRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliAsalehTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliAsalehTableMap::translateFieldName('SpCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliAsalehTableMap::translateFieldName('SpPos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_pos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliAsalehTableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliAsalehTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliAsalehTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliAsalehTableMap::translateFieldName('TotalVat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_vat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliAsalehTableMap::translateFieldName('TotalNet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_net = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliAsalehTableMap::translateFieldName('TotalInvat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_invat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliAsalehTableMap::translateFieldName('TotalExvat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_exvat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliAsalehTableMap::translateFieldName('CustomerTotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliAsalehTableMap::translateFieldName('TotPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliAsalehTableMap::translateFieldName('TotBv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliAsalehTableMap::translateFieldName('TotFv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliAsalehTableMap::translateFieldName('TotSppv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_sppv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliAsalehTableMap::translateFieldName('TotWeight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_weight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliAsalehTableMap::translateFieldName('Usercode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usercode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliAsalehTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliAsalehTableMap::translateFieldName('Trnf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trnf = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliAsalehTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliAsalehTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliAsalehTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliAsalehTableMap::translateFieldName('UidBranch', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_branch = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliAsalehTableMap::translateFieldName('Lid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliAsalehTableMap::translateFieldName('Dl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliAsalehTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliAsalehTableMap::translateFieldName('Send', TableMap::TYPE_PHPNAME, $indexType)];
            $this->send = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliAsalehTableMap::translateFieldName('Txtoption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtoption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliAsalehTableMap::translateFieldName('Chkcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliAsalehTableMap::translateFieldName('Chkfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliAsalehTableMap::translateFieldName('Chktransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chktransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliAsalehTableMap::translateFieldName('Chkcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliAsalehTableMap::translateFieldName('Chkcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliAsalehTableMap::translateFieldName('Chkcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliAsalehTableMap::translateFieldName('Chkcredit4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliAsalehTableMap::translateFieldName('Chkinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : AliAsalehTableMap::translateFieldName('Chkdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : AliAsalehTableMap::translateFieldName('Chkother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : AliAsalehTableMap::translateFieldName('Txtcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : AliAsalehTableMap::translateFieldName('Txtfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : AliAsalehTableMap::translateFieldName('Txttransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : AliAsalehTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : AliAsalehTableMap::translateFieldName('Txtcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : AliAsalehTableMap::translateFieldName('Txtcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : AliAsalehTableMap::translateFieldName('Txtcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : AliAsalehTableMap::translateFieldName('Txtcredit4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : AliAsalehTableMap::translateFieldName('Txtinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : AliAsalehTableMap::translateFieldName('Txtdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : AliAsalehTableMap::translateFieldName('Txtother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : AliAsalehTableMap::translateFieldName('Txtsending', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtsending = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : AliAsalehTableMap::translateFieldName('Optioncash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : AliAsalehTableMap::translateFieldName('Optionfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : AliAsalehTableMap::translateFieldName('Optiontransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : AliAsalehTableMap::translateFieldName('Optioncredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : AliAsalehTableMap::translateFieldName('Optioncredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : AliAsalehTableMap::translateFieldName('Optioncredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : AliAsalehTableMap::translateFieldName('Optioncredit4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : AliAsalehTableMap::translateFieldName('Optioninternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioninternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : AliAsalehTableMap::translateFieldName('Optiondiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiondiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 65 + $startcol : AliAsalehTableMap::translateFieldName('Optionother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 66 + $startcol : AliAsalehTableMap::translateFieldName('Discount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 67 + $startcol : AliAsalehTableMap::translateFieldName('Print', TableMap::TYPE_PHPNAME, $indexType)];
            $this->print = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 68 + $startcol : AliAsalehTableMap::translateFieldName('EwalletBefore', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_before = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 69 + $startcol : AliAsalehTableMap::translateFieldName('EwalletAfter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_after = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 70 + $startcol : AliAsalehTableMap::translateFieldName('Ipay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ipay = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 71 + $startcol : AliAsalehTableMap::translateFieldName('PayType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pay_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 72 + $startcol : AliAsalehTableMap::translateFieldName('Hcancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hcancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 73 + $startcol : AliAsalehTableMap::translateFieldName('Caddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 74 + $startcol : AliAsalehTableMap::translateFieldName('Cdistrictid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdistrictid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 75 + $startcol : AliAsalehTableMap::translateFieldName('Camphurid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->camphurid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 76 + $startcol : AliAsalehTableMap::translateFieldName('Cprovinceid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cprovinceid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 77 + $startcol : AliAsalehTableMap::translateFieldName('Czip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->czip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 78 + $startcol : AliAsalehTableMap::translateFieldName('Sender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sender = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 79 + $startcol : AliAsalehTableMap::translateFieldName('SenderDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sender_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 80 + $startcol : AliAsalehTableMap::translateFieldName('Receive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->receive = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 81 + $startcol : AliAsalehTableMap::translateFieldName('ReceiveDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->receive_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 82 + $startcol : AliAsalehTableMap::translateFieldName('Asend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->asend = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 83 + $startcol : AliAsalehTableMap::translateFieldName('AtoType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ato_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 84 + $startcol : AliAsalehTableMap::translateFieldName('AtoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ato_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 85 + $startcol : AliAsalehTableMap::translateFieldName('Online', TableMap::TYPE_PHPNAME, $indexType)];
            $this->online = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 86 + $startcol : AliAsalehTableMap::translateFieldName('Hpv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hpv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 87 + $startcol : AliAsalehTableMap::translateFieldName('Htotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->htotal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 88 + $startcol : AliAsalehTableMap::translateFieldName('Hdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->hdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 89 + $startcol : AliAsalehTableMap::translateFieldName('Scheck', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scheck = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 90 + $startcol : AliAsalehTableMap::translateFieldName('Checkportal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->checkportal = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 91 + $startcol : AliAsalehTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 92 + $startcol : AliAsalehTableMap::translateFieldName('Bmcauto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bmcauto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 93 + $startcol : AliAsalehTableMap::translateFieldName('CancelDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->cancel_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 94 + $startcol : AliAsalehTableMap::translateFieldName('UidCancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_cancel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 95 + $startcol : AliAsalehTableMap::translateFieldName('Cname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 96 + $startcol : AliAsalehTableMap::translateFieldName('Cmobile', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cmobile = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 97 + $startcol : AliAsalehTableMap::translateFieldName('UidSender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_sender = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 98 + $startcol : AliAsalehTableMap::translateFieldName('UidReceive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_receive = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 99 + $startcol : AliAsalehTableMap::translateFieldName('Mbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mbase = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 100 + $startcol : AliAsalehTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 101 + $startcol : AliAsalehTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 102 + $startcol : AliAsalehTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 103 + $startcol : AliAsalehTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 104 + $startcol : AliAsalehTableMap::translateFieldName('Ref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 105 + $startcol : AliAsalehTableMap::translateFieldName('Selectcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 106 + $startcol : AliAsalehTableMap::translateFieldName('Selecttransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selecttransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 107 + $startcol : AliAsalehTableMap::translateFieldName('Selectcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 108 + $startcol : AliAsalehTableMap::translateFieldName('Selectcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 109 + $startcol : AliAsalehTableMap::translateFieldName('Selectcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 110 + $startcol : AliAsalehTableMap::translateFieldName('Selectdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 111 + $startcol : AliAsalehTableMap::translateFieldName('Selectinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 112 + $startcol : AliAsalehTableMap::translateFieldName('Txtvoucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtvoucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 113 + $startcol : AliAsalehTableMap::translateFieldName('Optionvoucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionvoucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 114 + $startcol : AliAsalehTableMap::translateFieldName('Selectvoucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selectvoucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 115 + $startcol : AliAsalehTableMap::translateFieldName('Txttransfer1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 116 + $startcol : AliAsalehTableMap::translateFieldName('Optiontransfer1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 117 + $startcol : AliAsalehTableMap::translateFieldName('Selecttransfer1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selecttransfer1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 118 + $startcol : AliAsalehTableMap::translateFieldName('Txttransfer2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 119 + $startcol : AliAsalehTableMap::translateFieldName('Optiontransfer2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 120 + $startcol : AliAsalehTableMap::translateFieldName('Selecttransfer2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selecttransfer2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 121 + $startcol : AliAsalehTableMap::translateFieldName('Txttransfer3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 122 + $startcol : AliAsalehTableMap::translateFieldName('Optiontransfer3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 123 + $startcol : AliAsalehTableMap::translateFieldName('Selecttransfer3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->selecttransfer3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 124 + $startcol : AliAsalehTableMap::translateFieldName('StatusPackage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_package = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 125; // 125 = AliAsalehTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliAsaleh'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliAsalehQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliAsaleh::setDeleted()
     * @see AliAsaleh::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliAsalehQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsalehTableMap::DATABASE_NAME);
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
                AliAsalehTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliAsalehTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliAsalehTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliAsalehTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_PANO)) {
            $modifiedColumns[':p' . $index++]  = 'pano';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'sctime';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_INV_REF)) {
            $modifiedColumns[':p' . $index++]  = 'inv_ref';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sp_code';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SP_POS)) {
            $modifiedColumns[':p' . $index++]  = 'sp_pos';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_VAT)) {
            $modifiedColumns[':p' . $index++]  = 'total_vat';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_NET)) {
            $modifiedColumns[':p' . $index++]  = 'total_net';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_INVAT)) {
            $modifiedColumns[':p' . $index++]  = 'total_invat';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_EXVAT)) {
            $modifiedColumns[':p' . $index++]  = 'total_exvat';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CUSTOMER_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'customer_total';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_PV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_pv';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_BV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_bv';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_FV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_fv';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_SPPV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_sppv';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'tot_weight';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_USERCODE)) {
            $modifiedColumns[':p' . $index++]  = 'usercode';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TRNF)) {
            $modifiedColumns[':p' . $index++]  = 'trnf';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_BRANCH)) {
            $modifiedColumns[':p' . $index++]  = 'uid_branch';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_LID)) {
            $modifiedColumns[':p' . $index++]  = 'lid';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_DL)) {
            $modifiedColumns[':p' . $index++]  = 'dl';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SEND)) {
            $modifiedColumns[':p' . $index++]  = 'send';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTOPTION)) {
            $modifiedColumns[':p' . $index++]  = 'txtoption';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCASH)) {
            $modifiedColumns[':p' . $index++]  = 'chkCash';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'chkFuture';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'chkTransfer';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT4)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit4';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'chkInternet';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'chkDiscount';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'chkOther';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCASH)) {
            $modifiedColumns[':p' . $index++]  = 'txtCash';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'txtFuture';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT4)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit4';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'txtInternet';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'txtDiscount';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'txtOther';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTSENDING)) {
            $modifiedColumns[':p' . $index++]  = 'txtSending';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCASH)) {
            $modifiedColumns[':p' . $index++]  = 'optionCash';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'optionFuture';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT4)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit4';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'optionInternet';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'optionDiscount';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'optionOther';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'discount';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_PRINT)) {
            $modifiedColumns[':p' . $index++]  = 'print';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_EWALLET_BEFORE)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_before';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_EWALLET_AFTER)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_after';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_IPAY)) {
            $modifiedColumns[':p' . $index++]  = 'ipay';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_PAY_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'pay_type';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HCANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'hcancel';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'caddress';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CDISTRICTID)) {
            $modifiedColumns[':p' . $index++]  = 'cdistrictId';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CAMPHURID)) {
            $modifiedColumns[':p' . $index++]  = 'camphurId';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CPROVINCEID)) {
            $modifiedColumns[':p' . $index++]  = 'cprovinceId';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CZIP)) {
            $modifiedColumns[':p' . $index++]  = 'czip';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SENDER)) {
            $modifiedColumns[':p' . $index++]  = 'sender';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SENDER_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'sender_date';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_RECEIVE)) {
            $modifiedColumns[':p' . $index++]  = 'receive';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_RECEIVE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'receive_date';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ASEND)) {
            $modifiedColumns[':p' . $index++]  = 'asend';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ATO_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'ato_type';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ATO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ato_id';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ONLINE)) {
            $modifiedColumns[':p' . $index++]  = 'online';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HPV)) {
            $modifiedColumns[':p' . $index++]  = 'hpv';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HTOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'htotal';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HDATE)) {
            $modifiedColumns[':p' . $index++]  = 'hdate';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SCHECK)) {
            $modifiedColumns[':p' . $index++]  = 'scheck';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHECKPORTAL)) {
            $modifiedColumns[':p' . $index++]  = 'checkportal';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_BMCAUTO)) {
            $modifiedColumns[':p' . $index++]  = 'bmcauto';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CANCEL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_date';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'uid_cancel';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CNAME)) {
            $modifiedColumns[':p' . $index++]  = 'cname';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CMOBILE)) {
            $modifiedColumns[':p' . $index++]  = 'cmobile';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_SENDER)) {
            $modifiedColumns[':p' . $index++]  = 'uid_sender';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_RECEIVE)) {
            $modifiedColumns[':p' . $index++]  = 'uid_receive';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_MBASE)) {
            $modifiedColumns[':p' . $index++]  = 'mbase';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_REF)) {
            $modifiedColumns[':p' . $index++]  = 'ref';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCASH)) {
            $modifiedColumns[':p' . $index++]  = 'selectCash';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'selectTransfer';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'selectCredit1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'selectCredit2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'selectCredit3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'selectDiscount';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'selectInternet';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTVOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'txtVoucher';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONVOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'optionVoucher';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTVOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'selectVoucher';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER1)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER1)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER1)) {
            $modifiedColumns[':p' . $index++]  = 'selectTransfer1';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER2)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER2)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER2)) {
            $modifiedColumns[':p' . $index++]  = 'selectTransfer2';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER3)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER3)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER3)) {
            $modifiedColumns[':p' . $index++]  = 'selectTransfer3';
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_STATUS_PACKAGE)) {
            $modifiedColumns[':p' . $index++]  = 'status_package';
        }

        $sql = sprintf(
            'INSERT INTO ali_asaleh (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_STR);
                        break;
                    case 'pano':
                        $stmt->bindValue($identifier, $this->pano, PDO::PARAM_STR);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate, PDO::PARAM_STR);
                        break;
                    case 'sctime':
                        $stmt->bindValue($identifier, $this->sctime ? $this->sctime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
                    case 'sp_code':
                        $stmt->bindValue($identifier, $this->sp_code, PDO::PARAM_STR);
                        break;
                    case 'sp_pos':
                        $stmt->bindValue($identifier, $this->sp_pos, PDO::PARAM_STR);
                        break;
                    case 'name_f':
                        $stmt->bindValue($identifier, $this->name_f, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'total_vat':
                        $stmt->bindValue($identifier, $this->total_vat, PDO::PARAM_STR);
                        break;
                    case 'total_net':
                        $stmt->bindValue($identifier, $this->total_net, PDO::PARAM_STR);
                        break;
                    case 'total_invat':
                        $stmt->bindValue($identifier, $this->total_invat, PDO::PARAM_STR);
                        break;
                    case 'total_exvat':
                        $stmt->bindValue($identifier, $this->total_exvat, PDO::PARAM_STR);
                        break;
                    case 'customer_total':
                        $stmt->bindValue($identifier, $this->customer_total, PDO::PARAM_STR);
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
                    case 'tot_sppv':
                        $stmt->bindValue($identifier, $this->tot_sppv, PDO::PARAM_STR);
                        break;
                    case 'tot_weight':
                        $stmt->bindValue($identifier, $this->tot_weight, PDO::PARAM_STR);
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
                    case 'uid_branch':
                        $stmt->bindValue($identifier, $this->uid_branch, PDO::PARAM_STR);
                        break;
                    case 'lid':
                        $stmt->bindValue($identifier, $this->lid, PDO::PARAM_STR);
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
                    case 'chkCredit4':
                        $stmt->bindValue($identifier, $this->chkcredit4, PDO::PARAM_STR);
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
                    case 'txtCredit4':
                        $stmt->bindValue($identifier, $this->txtcredit4, PDO::PARAM_STR);
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
                    case 'txtSending':
                        $stmt->bindValue($identifier, $this->txtsending, PDO::PARAM_STR);
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
                    case 'optionCredit4':
                        $stmt->bindValue($identifier, $this->optioncredit4, PDO::PARAM_STR);
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
                    case 'ipay':
                        $stmt->bindValue($identifier, $this->ipay, PDO::PARAM_STR);
                        break;
                    case 'pay_type':
                        $stmt->bindValue($identifier, $this->pay_type, PDO::PARAM_STR);
                        break;
                    case 'hcancel':
                        $stmt->bindValue($identifier, $this->hcancel, PDO::PARAM_INT);
                        break;
                    case 'caddress':
                        $stmt->bindValue($identifier, $this->caddress, PDO::PARAM_STR);
                        break;
                    case 'cdistrictId':
                        $stmt->bindValue($identifier, $this->cdistrictid, PDO::PARAM_STR);
                        break;
                    case 'camphurId':
                        $stmt->bindValue($identifier, $this->camphurid, PDO::PARAM_STR);
                        break;
                    case 'cprovinceId':
                        $stmt->bindValue($identifier, $this->cprovinceid, PDO::PARAM_STR);
                        break;
                    case 'czip':
                        $stmt->bindValue($identifier, $this->czip, PDO::PARAM_STR);
                        break;
                    case 'sender':
                        $stmt->bindValue($identifier, $this->sender, PDO::PARAM_INT);
                        break;
                    case 'sender_date':
                        $stmt->bindValue($identifier, $this->sender_date ? $this->sender_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'receive':
                        $stmt->bindValue($identifier, $this->receive, PDO::PARAM_INT);
                        break;
                    case 'receive_date':
                        $stmt->bindValue($identifier, $this->receive_date ? $this->receive_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'asend':
                        $stmt->bindValue($identifier, $this->asend, PDO::PARAM_INT);
                        break;
                    case 'ato_type':
                        $stmt->bindValue($identifier, $this->ato_type, PDO::PARAM_INT);
                        break;
                    case 'ato_id':
                        $stmt->bindValue($identifier, $this->ato_id, PDO::PARAM_INT);
                        break;
                    case 'online':
                        $stmt->bindValue($identifier, $this->online, PDO::PARAM_INT);
                        break;
                    case 'hpv':
                        $stmt->bindValue($identifier, $this->hpv, PDO::PARAM_STR);
                        break;
                    case 'htotal':
                        $stmt->bindValue($identifier, $this->htotal, PDO::PARAM_STR);
                        break;
                    case 'hdate':
                        $stmt->bindValue($identifier, $this->hdate ? $this->hdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'scheck':
                        $stmt->bindValue($identifier, $this->scheck, PDO::PARAM_STR);
                        break;
                    case 'checkportal':
                        $stmt->bindValue($identifier, $this->checkportal, PDO::PARAM_INT);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'bmcauto':
                        $stmt->bindValue($identifier, $this->bmcauto, PDO::PARAM_INT);
                        break;
                    case 'cancel_date':
                        $stmt->bindValue($identifier, $this->cancel_date ? $this->cancel_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'uid_cancel':
                        $stmt->bindValue($identifier, $this->uid_cancel, PDO::PARAM_STR);
                        break;
                    case 'cname':
                        $stmt->bindValue($identifier, $this->cname, PDO::PARAM_STR);
                        break;
                    case 'cmobile':
                        $stmt->bindValue($identifier, $this->cmobile, PDO::PARAM_STR);
                        break;
                    case 'uid_sender':
                        $stmt->bindValue($identifier, $this->uid_sender, PDO::PARAM_STR);
                        break;
                    case 'uid_receive':
                        $stmt->bindValue($identifier, $this->uid_receive, PDO::PARAM_STR);
                        break;
                    case 'mbase':
                        $stmt->bindValue($identifier, $this->mbase, PDO::PARAM_STR);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case 'ref':
                        $stmt->bindValue($identifier, $this->ref, PDO::PARAM_STR);
                        break;
                    case 'selectCash':
                        $stmt->bindValue($identifier, $this->selectcash, PDO::PARAM_STR);
                        break;
                    case 'selectTransfer':
                        $stmt->bindValue($identifier, $this->selecttransfer, PDO::PARAM_STR);
                        break;
                    case 'selectCredit1':
                        $stmt->bindValue($identifier, $this->selectcredit1, PDO::PARAM_STR);
                        break;
                    case 'selectCredit2':
                        $stmt->bindValue($identifier, $this->selectcredit2, PDO::PARAM_STR);
                        break;
                    case 'selectCredit3':
                        $stmt->bindValue($identifier, $this->selectcredit3, PDO::PARAM_STR);
                        break;
                    case 'selectDiscount':
                        $stmt->bindValue($identifier, $this->selectdiscount, PDO::PARAM_STR);
                        break;
                    case 'selectInternet':
                        $stmt->bindValue($identifier, $this->selectinternet, PDO::PARAM_STR);
                        break;
                    case 'txtVoucher':
                        $stmt->bindValue($identifier, $this->txtvoucher, PDO::PARAM_STR);
                        break;
                    case 'optionVoucher':
                        $stmt->bindValue($identifier, $this->optionvoucher, PDO::PARAM_STR);
                        break;
                    case 'selectVoucher':
                        $stmt->bindValue($identifier, $this->selectvoucher, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer1':
                        $stmt->bindValue($identifier, $this->txttransfer1, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer1':
                        $stmt->bindValue($identifier, $this->optiontransfer1, PDO::PARAM_STR);
                        break;
                    case 'selectTransfer1':
                        $stmt->bindValue($identifier, $this->selecttransfer1, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer2':
                        $stmt->bindValue($identifier, $this->txttransfer2, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer2':
                        $stmt->bindValue($identifier, $this->optiontransfer2, PDO::PARAM_STR);
                        break;
                    case 'selectTransfer2':
                        $stmt->bindValue($identifier, $this->selecttransfer2, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer3':
                        $stmt->bindValue($identifier, $this->txttransfer3, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer3':
                        $stmt->bindValue($identifier, $this->optiontransfer3, PDO::PARAM_STR);
                        break;
                    case 'selectTransfer3':
                        $stmt->bindValue($identifier, $this->selecttransfer3, PDO::PARAM_STR);
                        break;
                    case 'status_package':
                        $stmt->bindValue($identifier, $this->status_package, PDO::PARAM_INT);
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
        $pos = AliAsalehTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPano();
                break;
            case 2:
                return $this->getSadate();
                break;
            case 3:
                return $this->getSctime();
                break;
            case 4:
                return $this->getInvCode();
                break;
            case 5:
                return $this->getInvRef();
                break;
            case 6:
                return $this->getMcode();
                break;
            case 7:
                return $this->getSpCode();
                break;
            case 8:
                return $this->getSpPos();
                break;
            case 9:
                return $this->getNameF();
                break;
            case 10:
                return $this->getNameT();
                break;
            case 11:
                return $this->getTotal();
                break;
            case 12:
                return $this->getTotalVat();
                break;
            case 13:
                return $this->getTotalNet();
                break;
            case 14:
                return $this->getTotalInvat();
                break;
            case 15:
                return $this->getTotalExvat();
                break;
            case 16:
                return $this->getCustomerTotal();
                break;
            case 17:
                return $this->getTotPv();
                break;
            case 18:
                return $this->getTotBv();
                break;
            case 19:
                return $this->getTotFv();
                break;
            case 20:
                return $this->getTotSppv();
                break;
            case 21:
                return $this->getTotWeight();
                break;
            case 22:
                return $this->getUsercode();
                break;
            case 23:
                return $this->getRemark();
                break;
            case 24:
                return $this->getTrnf();
                break;
            case 25:
                return $this->getId();
                break;
            case 26:
                return $this->getSaType();
                break;
            case 27:
                return $this->getUid();
                break;
            case 28:
                return $this->getUidBranch();
                break;
            case 29:
                return $this->getLid();
                break;
            case 30:
                return $this->getDl();
                break;
            case 31:
                return $this->getCancel();
                break;
            case 32:
                return $this->getSend();
                break;
            case 33:
                return $this->getTxtoption();
                break;
            case 34:
                return $this->getChkcash();
                break;
            case 35:
                return $this->getChkfuture();
                break;
            case 36:
                return $this->getChktransfer();
                break;
            case 37:
                return $this->getChkcredit1();
                break;
            case 38:
                return $this->getChkcredit2();
                break;
            case 39:
                return $this->getChkcredit3();
                break;
            case 40:
                return $this->getChkcredit4();
                break;
            case 41:
                return $this->getChkinternet();
                break;
            case 42:
                return $this->getChkdiscount();
                break;
            case 43:
                return $this->getChkother();
                break;
            case 44:
                return $this->getTxtcash();
                break;
            case 45:
                return $this->getTxtfuture();
                break;
            case 46:
                return $this->getTxttransfer();
                break;
            case 47:
                return $this->getEwallet();
                break;
            case 48:
                return $this->getTxtcredit1();
                break;
            case 49:
                return $this->getTxtcredit2();
                break;
            case 50:
                return $this->getTxtcredit3();
                break;
            case 51:
                return $this->getTxtcredit4();
                break;
            case 52:
                return $this->getTxtinternet();
                break;
            case 53:
                return $this->getTxtdiscount();
                break;
            case 54:
                return $this->getTxtother();
                break;
            case 55:
                return $this->getTxtsending();
                break;
            case 56:
                return $this->getOptioncash();
                break;
            case 57:
                return $this->getOptionfuture();
                break;
            case 58:
                return $this->getOptiontransfer();
                break;
            case 59:
                return $this->getOptioncredit1();
                break;
            case 60:
                return $this->getOptioncredit2();
                break;
            case 61:
                return $this->getOptioncredit3();
                break;
            case 62:
                return $this->getOptioncredit4();
                break;
            case 63:
                return $this->getOptioninternet();
                break;
            case 64:
                return $this->getOptiondiscount();
                break;
            case 65:
                return $this->getOptionother();
                break;
            case 66:
                return $this->getDiscount();
                break;
            case 67:
                return $this->getPrint();
                break;
            case 68:
                return $this->getEwalletBefore();
                break;
            case 69:
                return $this->getEwalletAfter();
                break;
            case 70:
                return $this->getIpay();
                break;
            case 71:
                return $this->getPayType();
                break;
            case 72:
                return $this->getHcancel();
                break;
            case 73:
                return $this->getCaddress();
                break;
            case 74:
                return $this->getCdistrictid();
                break;
            case 75:
                return $this->getCamphurid();
                break;
            case 76:
                return $this->getCprovinceid();
                break;
            case 77:
                return $this->getCzip();
                break;
            case 78:
                return $this->getSender();
                break;
            case 79:
                return $this->getSenderDate();
                break;
            case 80:
                return $this->getReceive();
                break;
            case 81:
                return $this->getReceiveDate();
                break;
            case 82:
                return $this->getAsend();
                break;
            case 83:
                return $this->getAtoType();
                break;
            case 84:
                return $this->getAtoId();
                break;
            case 85:
                return $this->getOnline();
                break;
            case 86:
                return $this->getHpv();
                break;
            case 87:
                return $this->getHtotal();
                break;
            case 88:
                return $this->getHdate();
                break;
            case 89:
                return $this->getScheck();
                break;
            case 90:
                return $this->getCheckportal();
                break;
            case 91:
                return $this->getRcode();
                break;
            case 92:
                return $this->getBmcauto();
                break;
            case 93:
                return $this->getCancelDate();
                break;
            case 94:
                return $this->getUidCancel();
                break;
            case 95:
                return $this->getCname();
                break;
            case 96:
                return $this->getCmobile();
                break;
            case 97:
                return $this->getUidSender();
                break;
            case 98:
                return $this->getUidReceive();
                break;
            case 99:
                return $this->getMbase();
                break;
            case 100:
                return $this->getBprice();
                break;
            case 101:
                return $this->getLocationbase();
                break;
            case 102:
                return $this->getCrate();
                break;
            case 103:
                return $this->getStatus();
                break;
            case 104:
                return $this->getRef();
                break;
            case 105:
                return $this->getSelectcash();
                break;
            case 106:
                return $this->getSelecttransfer();
                break;
            case 107:
                return $this->getSelectcredit1();
                break;
            case 108:
                return $this->getSelectcredit2();
                break;
            case 109:
                return $this->getSelectcredit3();
                break;
            case 110:
                return $this->getSelectdiscount();
                break;
            case 111:
                return $this->getSelectinternet();
                break;
            case 112:
                return $this->getTxtvoucher();
                break;
            case 113:
                return $this->getOptionvoucher();
                break;
            case 114:
                return $this->getSelectvoucher();
                break;
            case 115:
                return $this->getTxttransfer1();
                break;
            case 116:
                return $this->getOptiontransfer1();
                break;
            case 117:
                return $this->getSelecttransfer1();
                break;
            case 118:
                return $this->getTxttransfer2();
                break;
            case 119:
                return $this->getOptiontransfer2();
                break;
            case 120:
                return $this->getSelecttransfer2();
                break;
            case 121:
                return $this->getTxttransfer3();
                break;
            case 122:
                return $this->getOptiontransfer3();
                break;
            case 123:
                return $this->getSelecttransfer3();
                break;
            case 124:
                return $this->getStatusPackage();
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

        if (isset($alreadyDumpedObjects['AliAsaleh'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliAsaleh'][$this->hashCode()] = true;
        $keys = AliAsalehTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSano(),
            $keys[1] => $this->getPano(),
            $keys[2] => $this->getSadate(),
            $keys[3] => $this->getSctime(),
            $keys[4] => $this->getInvCode(),
            $keys[5] => $this->getInvRef(),
            $keys[6] => $this->getMcode(),
            $keys[7] => $this->getSpCode(),
            $keys[8] => $this->getSpPos(),
            $keys[9] => $this->getNameF(),
            $keys[10] => $this->getNameT(),
            $keys[11] => $this->getTotal(),
            $keys[12] => $this->getTotalVat(),
            $keys[13] => $this->getTotalNet(),
            $keys[14] => $this->getTotalInvat(),
            $keys[15] => $this->getTotalExvat(),
            $keys[16] => $this->getCustomerTotal(),
            $keys[17] => $this->getTotPv(),
            $keys[18] => $this->getTotBv(),
            $keys[19] => $this->getTotFv(),
            $keys[20] => $this->getTotSppv(),
            $keys[21] => $this->getTotWeight(),
            $keys[22] => $this->getUsercode(),
            $keys[23] => $this->getRemark(),
            $keys[24] => $this->getTrnf(),
            $keys[25] => $this->getId(),
            $keys[26] => $this->getSaType(),
            $keys[27] => $this->getUid(),
            $keys[28] => $this->getUidBranch(),
            $keys[29] => $this->getLid(),
            $keys[30] => $this->getDl(),
            $keys[31] => $this->getCancel(),
            $keys[32] => $this->getSend(),
            $keys[33] => $this->getTxtoption(),
            $keys[34] => $this->getChkcash(),
            $keys[35] => $this->getChkfuture(),
            $keys[36] => $this->getChktransfer(),
            $keys[37] => $this->getChkcredit1(),
            $keys[38] => $this->getChkcredit2(),
            $keys[39] => $this->getChkcredit3(),
            $keys[40] => $this->getChkcredit4(),
            $keys[41] => $this->getChkinternet(),
            $keys[42] => $this->getChkdiscount(),
            $keys[43] => $this->getChkother(),
            $keys[44] => $this->getTxtcash(),
            $keys[45] => $this->getTxtfuture(),
            $keys[46] => $this->getTxttransfer(),
            $keys[47] => $this->getEwallet(),
            $keys[48] => $this->getTxtcredit1(),
            $keys[49] => $this->getTxtcredit2(),
            $keys[50] => $this->getTxtcredit3(),
            $keys[51] => $this->getTxtcredit4(),
            $keys[52] => $this->getTxtinternet(),
            $keys[53] => $this->getTxtdiscount(),
            $keys[54] => $this->getTxtother(),
            $keys[55] => $this->getTxtsending(),
            $keys[56] => $this->getOptioncash(),
            $keys[57] => $this->getOptionfuture(),
            $keys[58] => $this->getOptiontransfer(),
            $keys[59] => $this->getOptioncredit1(),
            $keys[60] => $this->getOptioncredit2(),
            $keys[61] => $this->getOptioncredit3(),
            $keys[62] => $this->getOptioncredit4(),
            $keys[63] => $this->getOptioninternet(),
            $keys[64] => $this->getOptiondiscount(),
            $keys[65] => $this->getOptionother(),
            $keys[66] => $this->getDiscount(),
            $keys[67] => $this->getPrint(),
            $keys[68] => $this->getEwalletBefore(),
            $keys[69] => $this->getEwalletAfter(),
            $keys[70] => $this->getIpay(),
            $keys[71] => $this->getPayType(),
            $keys[72] => $this->getHcancel(),
            $keys[73] => $this->getCaddress(),
            $keys[74] => $this->getCdistrictid(),
            $keys[75] => $this->getCamphurid(),
            $keys[76] => $this->getCprovinceid(),
            $keys[77] => $this->getCzip(),
            $keys[78] => $this->getSender(),
            $keys[79] => $this->getSenderDate(),
            $keys[80] => $this->getReceive(),
            $keys[81] => $this->getReceiveDate(),
            $keys[82] => $this->getAsend(),
            $keys[83] => $this->getAtoType(),
            $keys[84] => $this->getAtoId(),
            $keys[85] => $this->getOnline(),
            $keys[86] => $this->getHpv(),
            $keys[87] => $this->getHtotal(),
            $keys[88] => $this->getHdate(),
            $keys[89] => $this->getScheck(),
            $keys[90] => $this->getCheckportal(),
            $keys[91] => $this->getRcode(),
            $keys[92] => $this->getBmcauto(),
            $keys[93] => $this->getCancelDate(),
            $keys[94] => $this->getUidCancel(),
            $keys[95] => $this->getCname(),
            $keys[96] => $this->getCmobile(),
            $keys[97] => $this->getUidSender(),
            $keys[98] => $this->getUidReceive(),
            $keys[99] => $this->getMbase(),
            $keys[100] => $this->getBprice(),
            $keys[101] => $this->getLocationbase(),
            $keys[102] => $this->getCrate(),
            $keys[103] => $this->getStatus(),
            $keys[104] => $this->getRef(),
            $keys[105] => $this->getSelectcash(),
            $keys[106] => $this->getSelecttransfer(),
            $keys[107] => $this->getSelectcredit1(),
            $keys[108] => $this->getSelectcredit2(),
            $keys[109] => $this->getSelectcredit3(),
            $keys[110] => $this->getSelectdiscount(),
            $keys[111] => $this->getSelectinternet(),
            $keys[112] => $this->getTxtvoucher(),
            $keys[113] => $this->getOptionvoucher(),
            $keys[114] => $this->getSelectvoucher(),
            $keys[115] => $this->getTxttransfer1(),
            $keys[116] => $this->getOptiontransfer1(),
            $keys[117] => $this->getSelecttransfer1(),
            $keys[118] => $this->getTxttransfer2(),
            $keys[119] => $this->getOptiontransfer2(),
            $keys[120] => $this->getSelecttransfer2(),
            $keys[121] => $this->getTxttransfer3(),
            $keys[122] => $this->getOptiontransfer3(),
            $keys[123] => $this->getSelecttransfer3(),
            $keys[124] => $this->getStatusPackage(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[79]] instanceof \DateTimeInterface) {
            $result[$keys[79]] = $result[$keys[79]]->format('c');
        }

        if ($result[$keys[81]] instanceof \DateTimeInterface) {
            $result[$keys[81]] = $result[$keys[81]]->format('c');
        }

        if ($result[$keys[88]] instanceof \DateTimeInterface) {
            $result[$keys[88]] = $result[$keys[88]]->format('c');
        }

        if ($result[$keys[93]] instanceof \DateTimeInterface) {
            $result[$keys[93]] = $result[$keys[93]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliAsaleh
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliAsalehTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliAsaleh
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSano($value);
                break;
            case 1:
                $this->setPano($value);
                break;
            case 2:
                $this->setSadate($value);
                break;
            case 3:
                $this->setSctime($value);
                break;
            case 4:
                $this->setInvCode($value);
                break;
            case 5:
                $this->setInvRef($value);
                break;
            case 6:
                $this->setMcode($value);
                break;
            case 7:
                $this->setSpCode($value);
                break;
            case 8:
                $this->setSpPos($value);
                break;
            case 9:
                $this->setNameF($value);
                break;
            case 10:
                $this->setNameT($value);
                break;
            case 11:
                $this->setTotal($value);
                break;
            case 12:
                $this->setTotalVat($value);
                break;
            case 13:
                $this->setTotalNet($value);
                break;
            case 14:
                $this->setTotalInvat($value);
                break;
            case 15:
                $this->setTotalExvat($value);
                break;
            case 16:
                $this->setCustomerTotal($value);
                break;
            case 17:
                $this->setTotPv($value);
                break;
            case 18:
                $this->setTotBv($value);
                break;
            case 19:
                $this->setTotFv($value);
                break;
            case 20:
                $this->setTotSppv($value);
                break;
            case 21:
                $this->setTotWeight($value);
                break;
            case 22:
                $this->setUsercode($value);
                break;
            case 23:
                $this->setRemark($value);
                break;
            case 24:
                $this->setTrnf($value);
                break;
            case 25:
                $this->setId($value);
                break;
            case 26:
                $this->setSaType($value);
                break;
            case 27:
                $this->setUid($value);
                break;
            case 28:
                $this->setUidBranch($value);
                break;
            case 29:
                $this->setLid($value);
                break;
            case 30:
                $this->setDl($value);
                break;
            case 31:
                $this->setCancel($value);
                break;
            case 32:
                $this->setSend($value);
                break;
            case 33:
                $this->setTxtoption($value);
                break;
            case 34:
                $this->setChkcash($value);
                break;
            case 35:
                $this->setChkfuture($value);
                break;
            case 36:
                $this->setChktransfer($value);
                break;
            case 37:
                $this->setChkcredit1($value);
                break;
            case 38:
                $this->setChkcredit2($value);
                break;
            case 39:
                $this->setChkcredit3($value);
                break;
            case 40:
                $this->setChkcredit4($value);
                break;
            case 41:
                $this->setChkinternet($value);
                break;
            case 42:
                $this->setChkdiscount($value);
                break;
            case 43:
                $this->setChkother($value);
                break;
            case 44:
                $this->setTxtcash($value);
                break;
            case 45:
                $this->setTxtfuture($value);
                break;
            case 46:
                $this->setTxttransfer($value);
                break;
            case 47:
                $this->setEwallet($value);
                break;
            case 48:
                $this->setTxtcredit1($value);
                break;
            case 49:
                $this->setTxtcredit2($value);
                break;
            case 50:
                $this->setTxtcredit3($value);
                break;
            case 51:
                $this->setTxtcredit4($value);
                break;
            case 52:
                $this->setTxtinternet($value);
                break;
            case 53:
                $this->setTxtdiscount($value);
                break;
            case 54:
                $this->setTxtother($value);
                break;
            case 55:
                $this->setTxtsending($value);
                break;
            case 56:
                $this->setOptioncash($value);
                break;
            case 57:
                $this->setOptionfuture($value);
                break;
            case 58:
                $this->setOptiontransfer($value);
                break;
            case 59:
                $this->setOptioncredit1($value);
                break;
            case 60:
                $this->setOptioncredit2($value);
                break;
            case 61:
                $this->setOptioncredit3($value);
                break;
            case 62:
                $this->setOptioncredit4($value);
                break;
            case 63:
                $this->setOptioninternet($value);
                break;
            case 64:
                $this->setOptiondiscount($value);
                break;
            case 65:
                $this->setOptionother($value);
                break;
            case 66:
                $this->setDiscount($value);
                break;
            case 67:
                $this->setPrint($value);
                break;
            case 68:
                $this->setEwalletBefore($value);
                break;
            case 69:
                $this->setEwalletAfter($value);
                break;
            case 70:
                $this->setIpay($value);
                break;
            case 71:
                $this->setPayType($value);
                break;
            case 72:
                $this->setHcancel($value);
                break;
            case 73:
                $this->setCaddress($value);
                break;
            case 74:
                $this->setCdistrictid($value);
                break;
            case 75:
                $this->setCamphurid($value);
                break;
            case 76:
                $this->setCprovinceid($value);
                break;
            case 77:
                $this->setCzip($value);
                break;
            case 78:
                $this->setSender($value);
                break;
            case 79:
                $this->setSenderDate($value);
                break;
            case 80:
                $this->setReceive($value);
                break;
            case 81:
                $this->setReceiveDate($value);
                break;
            case 82:
                $this->setAsend($value);
                break;
            case 83:
                $this->setAtoType($value);
                break;
            case 84:
                $this->setAtoId($value);
                break;
            case 85:
                $this->setOnline($value);
                break;
            case 86:
                $this->setHpv($value);
                break;
            case 87:
                $this->setHtotal($value);
                break;
            case 88:
                $this->setHdate($value);
                break;
            case 89:
                $this->setScheck($value);
                break;
            case 90:
                $this->setCheckportal($value);
                break;
            case 91:
                $this->setRcode($value);
                break;
            case 92:
                $this->setBmcauto($value);
                break;
            case 93:
                $this->setCancelDate($value);
                break;
            case 94:
                $this->setUidCancel($value);
                break;
            case 95:
                $this->setCname($value);
                break;
            case 96:
                $this->setCmobile($value);
                break;
            case 97:
                $this->setUidSender($value);
                break;
            case 98:
                $this->setUidReceive($value);
                break;
            case 99:
                $this->setMbase($value);
                break;
            case 100:
                $this->setBprice($value);
                break;
            case 101:
                $this->setLocationbase($value);
                break;
            case 102:
                $this->setCrate($value);
                break;
            case 103:
                $this->setStatus($value);
                break;
            case 104:
                $this->setRef($value);
                break;
            case 105:
                $this->setSelectcash($value);
                break;
            case 106:
                $this->setSelecttransfer($value);
                break;
            case 107:
                $this->setSelectcredit1($value);
                break;
            case 108:
                $this->setSelectcredit2($value);
                break;
            case 109:
                $this->setSelectcredit3($value);
                break;
            case 110:
                $this->setSelectdiscount($value);
                break;
            case 111:
                $this->setSelectinternet($value);
                break;
            case 112:
                $this->setTxtvoucher($value);
                break;
            case 113:
                $this->setOptionvoucher($value);
                break;
            case 114:
                $this->setSelectvoucher($value);
                break;
            case 115:
                $this->setTxttransfer1($value);
                break;
            case 116:
                $this->setOptiontransfer1($value);
                break;
            case 117:
                $this->setSelecttransfer1($value);
                break;
            case 118:
                $this->setTxttransfer2($value);
                break;
            case 119:
                $this->setOptiontransfer2($value);
                break;
            case 120:
                $this->setSelecttransfer2($value);
                break;
            case 121:
                $this->setTxttransfer3($value);
                break;
            case 122:
                $this->setOptiontransfer3($value);
                break;
            case 123:
                $this->setSelecttransfer3($value);
                break;
            case 124:
                $this->setStatusPackage($value);
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
        $keys = AliAsalehTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSano($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPano($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSadate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSctime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInvCode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setInvRef($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setMcode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSpCode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSpPos($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNameF($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setNameT($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotal($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTotalVat($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotalNet($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTotalInvat($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTotalExvat($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCustomerTotal($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTotPv($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTotBv($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setTotFv($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTotSppv($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setTotWeight($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setUsercode($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setRemark($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setTrnf($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setId($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setSaType($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setUid($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setUidBranch($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setLid($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setDl($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setCancel($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setSend($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setTxtoption($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setChkcash($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setChkfuture($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setChktransfer($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setChkcredit1($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setChkcredit2($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setChkcredit3($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setChkcredit4($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setChkinternet($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setChkdiscount($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setChkother($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setTxtcash($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setTxtfuture($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setTxttransfer($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setEwallet($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setTxtcredit1($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setTxtcredit2($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setTxtcredit3($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setTxtcredit4($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setTxtinternet($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setTxtdiscount($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setTxtother($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setTxtsending($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setOptioncash($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setOptionfuture($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setOptiontransfer($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setOptioncredit1($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setOptioncredit2($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setOptioncredit3($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setOptioncredit4($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setOptioninternet($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setOptiondiscount($arr[$keys[64]]);
        }
        if (array_key_exists($keys[65], $arr)) {
            $this->setOptionother($arr[$keys[65]]);
        }
        if (array_key_exists($keys[66], $arr)) {
            $this->setDiscount($arr[$keys[66]]);
        }
        if (array_key_exists($keys[67], $arr)) {
            $this->setPrint($arr[$keys[67]]);
        }
        if (array_key_exists($keys[68], $arr)) {
            $this->setEwalletBefore($arr[$keys[68]]);
        }
        if (array_key_exists($keys[69], $arr)) {
            $this->setEwalletAfter($arr[$keys[69]]);
        }
        if (array_key_exists($keys[70], $arr)) {
            $this->setIpay($arr[$keys[70]]);
        }
        if (array_key_exists($keys[71], $arr)) {
            $this->setPayType($arr[$keys[71]]);
        }
        if (array_key_exists($keys[72], $arr)) {
            $this->setHcancel($arr[$keys[72]]);
        }
        if (array_key_exists($keys[73], $arr)) {
            $this->setCaddress($arr[$keys[73]]);
        }
        if (array_key_exists($keys[74], $arr)) {
            $this->setCdistrictid($arr[$keys[74]]);
        }
        if (array_key_exists($keys[75], $arr)) {
            $this->setCamphurid($arr[$keys[75]]);
        }
        if (array_key_exists($keys[76], $arr)) {
            $this->setCprovinceid($arr[$keys[76]]);
        }
        if (array_key_exists($keys[77], $arr)) {
            $this->setCzip($arr[$keys[77]]);
        }
        if (array_key_exists($keys[78], $arr)) {
            $this->setSender($arr[$keys[78]]);
        }
        if (array_key_exists($keys[79], $arr)) {
            $this->setSenderDate($arr[$keys[79]]);
        }
        if (array_key_exists($keys[80], $arr)) {
            $this->setReceive($arr[$keys[80]]);
        }
        if (array_key_exists($keys[81], $arr)) {
            $this->setReceiveDate($arr[$keys[81]]);
        }
        if (array_key_exists($keys[82], $arr)) {
            $this->setAsend($arr[$keys[82]]);
        }
        if (array_key_exists($keys[83], $arr)) {
            $this->setAtoType($arr[$keys[83]]);
        }
        if (array_key_exists($keys[84], $arr)) {
            $this->setAtoId($arr[$keys[84]]);
        }
        if (array_key_exists($keys[85], $arr)) {
            $this->setOnline($arr[$keys[85]]);
        }
        if (array_key_exists($keys[86], $arr)) {
            $this->setHpv($arr[$keys[86]]);
        }
        if (array_key_exists($keys[87], $arr)) {
            $this->setHtotal($arr[$keys[87]]);
        }
        if (array_key_exists($keys[88], $arr)) {
            $this->setHdate($arr[$keys[88]]);
        }
        if (array_key_exists($keys[89], $arr)) {
            $this->setScheck($arr[$keys[89]]);
        }
        if (array_key_exists($keys[90], $arr)) {
            $this->setCheckportal($arr[$keys[90]]);
        }
        if (array_key_exists($keys[91], $arr)) {
            $this->setRcode($arr[$keys[91]]);
        }
        if (array_key_exists($keys[92], $arr)) {
            $this->setBmcauto($arr[$keys[92]]);
        }
        if (array_key_exists($keys[93], $arr)) {
            $this->setCancelDate($arr[$keys[93]]);
        }
        if (array_key_exists($keys[94], $arr)) {
            $this->setUidCancel($arr[$keys[94]]);
        }
        if (array_key_exists($keys[95], $arr)) {
            $this->setCname($arr[$keys[95]]);
        }
        if (array_key_exists($keys[96], $arr)) {
            $this->setCmobile($arr[$keys[96]]);
        }
        if (array_key_exists($keys[97], $arr)) {
            $this->setUidSender($arr[$keys[97]]);
        }
        if (array_key_exists($keys[98], $arr)) {
            $this->setUidReceive($arr[$keys[98]]);
        }
        if (array_key_exists($keys[99], $arr)) {
            $this->setMbase($arr[$keys[99]]);
        }
        if (array_key_exists($keys[100], $arr)) {
            $this->setBprice($arr[$keys[100]]);
        }
        if (array_key_exists($keys[101], $arr)) {
            $this->setLocationbase($arr[$keys[101]]);
        }
        if (array_key_exists($keys[102], $arr)) {
            $this->setCrate($arr[$keys[102]]);
        }
        if (array_key_exists($keys[103], $arr)) {
            $this->setStatus($arr[$keys[103]]);
        }
        if (array_key_exists($keys[104], $arr)) {
            $this->setRef($arr[$keys[104]]);
        }
        if (array_key_exists($keys[105], $arr)) {
            $this->setSelectcash($arr[$keys[105]]);
        }
        if (array_key_exists($keys[106], $arr)) {
            $this->setSelecttransfer($arr[$keys[106]]);
        }
        if (array_key_exists($keys[107], $arr)) {
            $this->setSelectcredit1($arr[$keys[107]]);
        }
        if (array_key_exists($keys[108], $arr)) {
            $this->setSelectcredit2($arr[$keys[108]]);
        }
        if (array_key_exists($keys[109], $arr)) {
            $this->setSelectcredit3($arr[$keys[109]]);
        }
        if (array_key_exists($keys[110], $arr)) {
            $this->setSelectdiscount($arr[$keys[110]]);
        }
        if (array_key_exists($keys[111], $arr)) {
            $this->setSelectinternet($arr[$keys[111]]);
        }
        if (array_key_exists($keys[112], $arr)) {
            $this->setTxtvoucher($arr[$keys[112]]);
        }
        if (array_key_exists($keys[113], $arr)) {
            $this->setOptionvoucher($arr[$keys[113]]);
        }
        if (array_key_exists($keys[114], $arr)) {
            $this->setSelectvoucher($arr[$keys[114]]);
        }
        if (array_key_exists($keys[115], $arr)) {
            $this->setTxttransfer1($arr[$keys[115]]);
        }
        if (array_key_exists($keys[116], $arr)) {
            $this->setOptiontransfer1($arr[$keys[116]]);
        }
        if (array_key_exists($keys[117], $arr)) {
            $this->setSelecttransfer1($arr[$keys[117]]);
        }
        if (array_key_exists($keys[118], $arr)) {
            $this->setTxttransfer2($arr[$keys[118]]);
        }
        if (array_key_exists($keys[119], $arr)) {
            $this->setOptiontransfer2($arr[$keys[119]]);
        }
        if (array_key_exists($keys[120], $arr)) {
            $this->setSelecttransfer2($arr[$keys[120]]);
        }
        if (array_key_exists($keys[121], $arr)) {
            $this->setTxttransfer3($arr[$keys[121]]);
        }
        if (array_key_exists($keys[122], $arr)) {
            $this->setOptiontransfer3($arr[$keys[122]]);
        }
        if (array_key_exists($keys[123], $arr)) {
            $this->setSelecttransfer3($arr[$keys[123]]);
        }
        if (array_key_exists($keys[124], $arr)) {
            $this->setStatusPackage($arr[$keys[124]]);
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
     * @return $this|\CciOrm\CciOrm\AliAsaleh The current object, for fluid interface
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
        $criteria = new Criteria(AliAsalehTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliAsalehTableMap::COL_SANO)) {
            $criteria->add(AliAsalehTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_PANO)) {
            $criteria->add(AliAsalehTableMap::COL_PANO, $this->pano);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SADATE)) {
            $criteria->add(AliAsalehTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SCTIME)) {
            $criteria->add(AliAsalehTableMap::COL_SCTIME, $this->sctime);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_INV_CODE)) {
            $criteria->add(AliAsalehTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_INV_REF)) {
            $criteria->add(AliAsalehTableMap::COL_INV_REF, $this->inv_ref);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_MCODE)) {
            $criteria->add(AliAsalehTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SP_CODE)) {
            $criteria->add(AliAsalehTableMap::COL_SP_CODE, $this->sp_code);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SP_POS)) {
            $criteria->add(AliAsalehTableMap::COL_SP_POS, $this->sp_pos);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_NAME_F)) {
            $criteria->add(AliAsalehTableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_NAME_T)) {
            $criteria->add(AliAsalehTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL)) {
            $criteria->add(AliAsalehTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_VAT)) {
            $criteria->add(AliAsalehTableMap::COL_TOTAL_VAT, $this->total_vat);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_NET)) {
            $criteria->add(AliAsalehTableMap::COL_TOTAL_NET, $this->total_net);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_INVAT)) {
            $criteria->add(AliAsalehTableMap::COL_TOTAL_INVAT, $this->total_invat);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOTAL_EXVAT)) {
            $criteria->add(AliAsalehTableMap::COL_TOTAL_EXVAT, $this->total_exvat);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CUSTOMER_TOTAL)) {
            $criteria->add(AliAsalehTableMap::COL_CUSTOMER_TOTAL, $this->customer_total);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_PV)) {
            $criteria->add(AliAsalehTableMap::COL_TOT_PV, $this->tot_pv);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_BV)) {
            $criteria->add(AliAsalehTableMap::COL_TOT_BV, $this->tot_bv);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_FV)) {
            $criteria->add(AliAsalehTableMap::COL_TOT_FV, $this->tot_fv);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_SPPV)) {
            $criteria->add(AliAsalehTableMap::COL_TOT_SPPV, $this->tot_sppv);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TOT_WEIGHT)) {
            $criteria->add(AliAsalehTableMap::COL_TOT_WEIGHT, $this->tot_weight);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_USERCODE)) {
            $criteria->add(AliAsalehTableMap::COL_USERCODE, $this->usercode);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_REMARK)) {
            $criteria->add(AliAsalehTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TRNF)) {
            $criteria->add(AliAsalehTableMap::COL_TRNF, $this->trnf);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ID)) {
            $criteria->add(AliAsalehTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SA_TYPE)) {
            $criteria->add(AliAsalehTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID)) {
            $criteria->add(AliAsalehTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_BRANCH)) {
            $criteria->add(AliAsalehTableMap::COL_UID_BRANCH, $this->uid_branch);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_LID)) {
            $criteria->add(AliAsalehTableMap::COL_LID, $this->lid);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_DL)) {
            $criteria->add(AliAsalehTableMap::COL_DL, $this->dl);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CANCEL)) {
            $criteria->add(AliAsalehTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SEND)) {
            $criteria->add(AliAsalehTableMap::COL_SEND, $this->send);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTOPTION)) {
            $criteria->add(AliAsalehTableMap::COL_TXTOPTION, $this->txtoption);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCASH)) {
            $criteria->add(AliAsalehTableMap::COL_CHKCASH, $this->chkcash);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKFUTURE)) {
            $criteria->add(AliAsalehTableMap::COL_CHKFUTURE, $this->chkfuture);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKTRANSFER)) {
            $criteria->add(AliAsalehTableMap::COL_CHKTRANSFER, $this->chktransfer);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT1)) {
            $criteria->add(AliAsalehTableMap::COL_CHKCREDIT1, $this->chkcredit1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT2)) {
            $criteria->add(AliAsalehTableMap::COL_CHKCREDIT2, $this->chkcredit2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT3)) {
            $criteria->add(AliAsalehTableMap::COL_CHKCREDIT3, $this->chkcredit3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKCREDIT4)) {
            $criteria->add(AliAsalehTableMap::COL_CHKCREDIT4, $this->chkcredit4);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKINTERNET)) {
            $criteria->add(AliAsalehTableMap::COL_CHKINTERNET, $this->chkinternet);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKDISCOUNT)) {
            $criteria->add(AliAsalehTableMap::COL_CHKDISCOUNT, $this->chkdiscount);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHKOTHER)) {
            $criteria->add(AliAsalehTableMap::COL_CHKOTHER, $this->chkother);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCASH)) {
            $criteria->add(AliAsalehTableMap::COL_TXTCASH, $this->txtcash);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTFUTURE)) {
            $criteria->add(AliAsalehTableMap::COL_TXTFUTURE, $this->txtfuture);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER)) {
            $criteria->add(AliAsalehTableMap::COL_TXTTRANSFER, $this->txttransfer);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_EWALLET)) {
            $criteria->add(AliAsalehTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT1)) {
            $criteria->add(AliAsalehTableMap::COL_TXTCREDIT1, $this->txtcredit1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT2)) {
            $criteria->add(AliAsalehTableMap::COL_TXTCREDIT2, $this->txtcredit2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT3)) {
            $criteria->add(AliAsalehTableMap::COL_TXTCREDIT3, $this->txtcredit3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTCREDIT4)) {
            $criteria->add(AliAsalehTableMap::COL_TXTCREDIT4, $this->txtcredit4);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTINTERNET)) {
            $criteria->add(AliAsalehTableMap::COL_TXTINTERNET, $this->txtinternet);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTDISCOUNT)) {
            $criteria->add(AliAsalehTableMap::COL_TXTDISCOUNT, $this->txtdiscount);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTOTHER)) {
            $criteria->add(AliAsalehTableMap::COL_TXTOTHER, $this->txtother);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTSENDING)) {
            $criteria->add(AliAsalehTableMap::COL_TXTSENDING, $this->txtsending);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCASH)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONCASH, $this->optioncash);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONFUTURE)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONFUTURE, $this->optionfuture);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONTRANSFER, $this->optiontransfer);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT1)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONCREDIT1, $this->optioncredit1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT2)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONCREDIT2, $this->optioncredit2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT3)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONCREDIT3, $this->optioncredit3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONCREDIT4)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONCREDIT4, $this->optioncredit4);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONINTERNET)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONINTERNET, $this->optioninternet);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONDISCOUNT)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONDISCOUNT, $this->optiondiscount);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONOTHER)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONOTHER, $this->optionother);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_DISCOUNT)) {
            $criteria->add(AliAsalehTableMap::COL_DISCOUNT, $this->discount);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_PRINT)) {
            $criteria->add(AliAsalehTableMap::COL_PRINT, $this->print);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_EWALLET_BEFORE)) {
            $criteria->add(AliAsalehTableMap::COL_EWALLET_BEFORE, $this->ewallet_before);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_EWALLET_AFTER)) {
            $criteria->add(AliAsalehTableMap::COL_EWALLET_AFTER, $this->ewallet_after);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_IPAY)) {
            $criteria->add(AliAsalehTableMap::COL_IPAY, $this->ipay);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_PAY_TYPE)) {
            $criteria->add(AliAsalehTableMap::COL_PAY_TYPE, $this->pay_type);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HCANCEL)) {
            $criteria->add(AliAsalehTableMap::COL_HCANCEL, $this->hcancel);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CADDRESS)) {
            $criteria->add(AliAsalehTableMap::COL_CADDRESS, $this->caddress);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CDISTRICTID)) {
            $criteria->add(AliAsalehTableMap::COL_CDISTRICTID, $this->cdistrictid);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CAMPHURID)) {
            $criteria->add(AliAsalehTableMap::COL_CAMPHURID, $this->camphurid);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CPROVINCEID)) {
            $criteria->add(AliAsalehTableMap::COL_CPROVINCEID, $this->cprovinceid);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CZIP)) {
            $criteria->add(AliAsalehTableMap::COL_CZIP, $this->czip);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SENDER)) {
            $criteria->add(AliAsalehTableMap::COL_SENDER, $this->sender);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SENDER_DATE)) {
            $criteria->add(AliAsalehTableMap::COL_SENDER_DATE, $this->sender_date);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_RECEIVE)) {
            $criteria->add(AliAsalehTableMap::COL_RECEIVE, $this->receive);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_RECEIVE_DATE)) {
            $criteria->add(AliAsalehTableMap::COL_RECEIVE_DATE, $this->receive_date);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ASEND)) {
            $criteria->add(AliAsalehTableMap::COL_ASEND, $this->asend);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ATO_TYPE)) {
            $criteria->add(AliAsalehTableMap::COL_ATO_TYPE, $this->ato_type);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ATO_ID)) {
            $criteria->add(AliAsalehTableMap::COL_ATO_ID, $this->ato_id);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_ONLINE)) {
            $criteria->add(AliAsalehTableMap::COL_ONLINE, $this->online);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HPV)) {
            $criteria->add(AliAsalehTableMap::COL_HPV, $this->hpv);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HTOTAL)) {
            $criteria->add(AliAsalehTableMap::COL_HTOTAL, $this->htotal);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_HDATE)) {
            $criteria->add(AliAsalehTableMap::COL_HDATE, $this->hdate);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SCHECK)) {
            $criteria->add(AliAsalehTableMap::COL_SCHECK, $this->scheck);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CHECKPORTAL)) {
            $criteria->add(AliAsalehTableMap::COL_CHECKPORTAL, $this->checkportal);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_RCODE)) {
            $criteria->add(AliAsalehTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_BMCAUTO)) {
            $criteria->add(AliAsalehTableMap::COL_BMCAUTO, $this->bmcauto);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CANCEL_DATE)) {
            $criteria->add(AliAsalehTableMap::COL_CANCEL_DATE, $this->cancel_date);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_CANCEL)) {
            $criteria->add(AliAsalehTableMap::COL_UID_CANCEL, $this->uid_cancel);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CNAME)) {
            $criteria->add(AliAsalehTableMap::COL_CNAME, $this->cname);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CMOBILE)) {
            $criteria->add(AliAsalehTableMap::COL_CMOBILE, $this->cmobile);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_SENDER)) {
            $criteria->add(AliAsalehTableMap::COL_UID_SENDER, $this->uid_sender);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_UID_RECEIVE)) {
            $criteria->add(AliAsalehTableMap::COL_UID_RECEIVE, $this->uid_receive);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_MBASE)) {
            $criteria->add(AliAsalehTableMap::COL_MBASE, $this->mbase);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_BPRICE)) {
            $criteria->add(AliAsalehTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliAsalehTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_CRATE)) {
            $criteria->add(AliAsalehTableMap::COL_CRATE, $this->crate);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_STATUS)) {
            $criteria->add(AliAsalehTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_REF)) {
            $criteria->add(AliAsalehTableMap::COL_REF, $this->ref);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCASH)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTCASH, $this->selectcash);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTTRANSFER, $this->selecttransfer);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCREDIT1)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTCREDIT1, $this->selectcredit1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCREDIT2)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTCREDIT2, $this->selectcredit2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTCREDIT3)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTCREDIT3, $this->selectcredit3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTDISCOUNT)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTDISCOUNT, $this->selectdiscount);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTINTERNET)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTINTERNET, $this->selectinternet);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTVOUCHER)) {
            $criteria->add(AliAsalehTableMap::COL_TXTVOUCHER, $this->txtvoucher);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONVOUCHER)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONVOUCHER, $this->optionvoucher);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTVOUCHER)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTVOUCHER, $this->selectvoucher);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER1)) {
            $criteria->add(AliAsalehTableMap::COL_TXTTRANSFER1, $this->txttransfer1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER1)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONTRANSFER1, $this->optiontransfer1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER1)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTTRANSFER1, $this->selecttransfer1);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER2)) {
            $criteria->add(AliAsalehTableMap::COL_TXTTRANSFER2, $this->txttransfer2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER2)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONTRANSFER2, $this->optiontransfer2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER2)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTTRANSFER2, $this->selecttransfer2);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_TXTTRANSFER3)) {
            $criteria->add(AliAsalehTableMap::COL_TXTTRANSFER3, $this->txttransfer3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_OPTIONTRANSFER3)) {
            $criteria->add(AliAsalehTableMap::COL_OPTIONTRANSFER3, $this->optiontransfer3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_SELECTTRANSFER3)) {
            $criteria->add(AliAsalehTableMap::COL_SELECTTRANSFER3, $this->selecttransfer3);
        }
        if ($this->isColumnModified(AliAsalehTableMap::COL_STATUS_PACKAGE)) {
            $criteria->add(AliAsalehTableMap::COL_STATUS_PACKAGE, $this->status_package);
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
        $criteria = ChildAliAsalehQuery::create();
        $criteria->add(AliAsalehTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliAsaleh (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSano($this->getSano());
        $copyObj->setPano($this->getPano());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setSctime($this->getSctime());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setInvRef($this->getInvRef());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setSpCode($this->getSpCode());
        $copyObj->setSpPos($this->getSpPos());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotalVat($this->getTotalVat());
        $copyObj->setTotalNet($this->getTotalNet());
        $copyObj->setTotalInvat($this->getTotalInvat());
        $copyObj->setTotalExvat($this->getTotalExvat());
        $copyObj->setCustomerTotal($this->getCustomerTotal());
        $copyObj->setTotPv($this->getTotPv());
        $copyObj->setTotBv($this->getTotBv());
        $copyObj->setTotFv($this->getTotFv());
        $copyObj->setTotSppv($this->getTotSppv());
        $copyObj->setTotWeight($this->getTotWeight());
        $copyObj->setUsercode($this->getUsercode());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setTrnf($this->getTrnf());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setUid($this->getUid());
        $copyObj->setUidBranch($this->getUidBranch());
        $copyObj->setLid($this->getLid());
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
        $copyObj->setChkcredit4($this->getChkcredit4());
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
        $copyObj->setTxtcredit4($this->getTxtcredit4());
        $copyObj->setTxtinternet($this->getTxtinternet());
        $copyObj->setTxtdiscount($this->getTxtdiscount());
        $copyObj->setTxtother($this->getTxtother());
        $copyObj->setTxtsending($this->getTxtsending());
        $copyObj->setOptioncash($this->getOptioncash());
        $copyObj->setOptionfuture($this->getOptionfuture());
        $copyObj->setOptiontransfer($this->getOptiontransfer());
        $copyObj->setOptioncredit1($this->getOptioncredit1());
        $copyObj->setOptioncredit2($this->getOptioncredit2());
        $copyObj->setOptioncredit3($this->getOptioncredit3());
        $copyObj->setOptioncredit4($this->getOptioncredit4());
        $copyObj->setOptioninternet($this->getOptioninternet());
        $copyObj->setOptiondiscount($this->getOptiondiscount());
        $copyObj->setOptionother($this->getOptionother());
        $copyObj->setDiscount($this->getDiscount());
        $copyObj->setPrint($this->getPrint());
        $copyObj->setEwalletBefore($this->getEwalletBefore());
        $copyObj->setEwalletAfter($this->getEwalletAfter());
        $copyObj->setIpay($this->getIpay());
        $copyObj->setPayType($this->getPayType());
        $copyObj->setHcancel($this->getHcancel());
        $copyObj->setCaddress($this->getCaddress());
        $copyObj->setCdistrictid($this->getCdistrictid());
        $copyObj->setCamphurid($this->getCamphurid());
        $copyObj->setCprovinceid($this->getCprovinceid());
        $copyObj->setCzip($this->getCzip());
        $copyObj->setSender($this->getSender());
        $copyObj->setSenderDate($this->getSenderDate());
        $copyObj->setReceive($this->getReceive());
        $copyObj->setReceiveDate($this->getReceiveDate());
        $copyObj->setAsend($this->getAsend());
        $copyObj->setAtoType($this->getAtoType());
        $copyObj->setAtoId($this->getAtoId());
        $copyObj->setOnline($this->getOnline());
        $copyObj->setHpv($this->getHpv());
        $copyObj->setHtotal($this->getHtotal());
        $copyObj->setHdate($this->getHdate());
        $copyObj->setScheck($this->getScheck());
        $copyObj->setCheckportal($this->getCheckportal());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setBmcauto($this->getBmcauto());
        $copyObj->setCancelDate($this->getCancelDate());
        $copyObj->setUidCancel($this->getUidCancel());
        $copyObj->setCname($this->getCname());
        $copyObj->setCmobile($this->getCmobile());
        $copyObj->setUidSender($this->getUidSender());
        $copyObj->setUidReceive($this->getUidReceive());
        $copyObj->setMbase($this->getMbase());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setCrate($this->getCrate());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setRef($this->getRef());
        $copyObj->setSelectcash($this->getSelectcash());
        $copyObj->setSelecttransfer($this->getSelecttransfer());
        $copyObj->setSelectcredit1($this->getSelectcredit1());
        $copyObj->setSelectcredit2($this->getSelectcredit2());
        $copyObj->setSelectcredit3($this->getSelectcredit3());
        $copyObj->setSelectdiscount($this->getSelectdiscount());
        $copyObj->setSelectinternet($this->getSelectinternet());
        $copyObj->setTxtvoucher($this->getTxtvoucher());
        $copyObj->setOptionvoucher($this->getOptionvoucher());
        $copyObj->setSelectvoucher($this->getSelectvoucher());
        $copyObj->setTxttransfer1($this->getTxttransfer1());
        $copyObj->setOptiontransfer1($this->getOptiontransfer1());
        $copyObj->setSelecttransfer1($this->getSelecttransfer1());
        $copyObj->setTxttransfer2($this->getTxttransfer2());
        $copyObj->setOptiontransfer2($this->getOptiontransfer2());
        $copyObj->setSelecttransfer2($this->getSelecttransfer2());
        $copyObj->setTxttransfer3($this->getTxttransfer3());
        $copyObj->setOptiontransfer3($this->getOptiontransfer3());
        $copyObj->setSelecttransfer3($this->getSelecttransfer3());
        $copyObj->setStatusPackage($this->getStatusPackage());
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
     * @return \CciOrm\CciOrm\AliAsaleh Clone of current object.
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
        $this->pano = null;
        $this->sadate = null;
        $this->sctime = null;
        $this->inv_code = null;
        $this->inv_ref = null;
        $this->mcode = null;
        $this->sp_code = null;
        $this->sp_pos = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->total = null;
        $this->total_vat = null;
        $this->total_net = null;
        $this->total_invat = null;
        $this->total_exvat = null;
        $this->customer_total = null;
        $this->tot_pv = null;
        $this->tot_bv = null;
        $this->tot_fv = null;
        $this->tot_sppv = null;
        $this->tot_weight = null;
        $this->usercode = null;
        $this->remark = null;
        $this->trnf = null;
        $this->id = null;
        $this->sa_type = null;
        $this->uid = null;
        $this->uid_branch = null;
        $this->lid = null;
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
        $this->chkcredit4 = null;
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
        $this->txtcredit4 = null;
        $this->txtinternet = null;
        $this->txtdiscount = null;
        $this->txtother = null;
        $this->txtsending = null;
        $this->optioncash = null;
        $this->optionfuture = null;
        $this->optiontransfer = null;
        $this->optioncredit1 = null;
        $this->optioncredit2 = null;
        $this->optioncredit3 = null;
        $this->optioncredit4 = null;
        $this->optioninternet = null;
        $this->optiondiscount = null;
        $this->optionother = null;
        $this->discount = null;
        $this->print = null;
        $this->ewallet_before = null;
        $this->ewallet_after = null;
        $this->ipay = null;
        $this->pay_type = null;
        $this->hcancel = null;
        $this->caddress = null;
        $this->cdistrictid = null;
        $this->camphurid = null;
        $this->cprovinceid = null;
        $this->czip = null;
        $this->sender = null;
        $this->sender_date = null;
        $this->receive = null;
        $this->receive_date = null;
        $this->asend = null;
        $this->ato_type = null;
        $this->ato_id = null;
        $this->online = null;
        $this->hpv = null;
        $this->htotal = null;
        $this->hdate = null;
        $this->scheck = null;
        $this->checkportal = null;
        $this->rcode = null;
        $this->bmcauto = null;
        $this->cancel_date = null;
        $this->uid_cancel = null;
        $this->cname = null;
        $this->cmobile = null;
        $this->uid_sender = null;
        $this->uid_receive = null;
        $this->mbase = null;
        $this->bprice = null;
        $this->locationbase = null;
        $this->crate = null;
        $this->status = null;
        $this->ref = null;
        $this->selectcash = null;
        $this->selecttransfer = null;
        $this->selectcredit1 = null;
        $this->selectcredit2 = null;
        $this->selectcredit3 = null;
        $this->selectdiscount = null;
        $this->selectinternet = null;
        $this->txtvoucher = null;
        $this->optionvoucher = null;
        $this->selectvoucher = null;
        $this->txttransfer1 = null;
        $this->optiontransfer1 = null;
        $this->selecttransfer1 = null;
        $this->txttransfer2 = null;
        $this->optiontransfer2 = null;
        $this->selecttransfer2 = null;
        $this->txttransfer3 = null;
        $this->optiontransfer3 = null;
        $this->selecttransfer3 = null;
        $this->status_package = null;
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
        return (string) $this->exportTo(AliAsalehTableMap::DEFAULT_STRING_FORMAT);
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
