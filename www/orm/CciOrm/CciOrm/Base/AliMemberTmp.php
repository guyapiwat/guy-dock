<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMemberTmpQuery as ChildAliMemberTmpQuery;
use CciOrm\CciOrm\Map\AliMemberTmpTableMap;
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
 * Base class that represents a row from the 'ali_member_tmp' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliMemberTmp implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliMemberTmpTableMap';


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
     * The value for the transtype field.
     *
     * @var        int
     */
    protected $transtype;

    /**
     * The value for the paytype field.
     *
     * @var        int
     */
    protected $paytype;

    /**
     * The value for the paydate field.
     *
     * @var        DateTime
     */
    protected $paydate;

    /**
     * The value for the credittype field.
     *
     * @var        int
     */
    protected $credittype;

    /**
     * The value for the sendtype field.
     *
     * @var        int
     */
    protected $sendtype;

    /**
     * The value for the cstreet field.
     *
     * @var        string
     */
    protected $cstreet;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

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
     * The value for the name_e field.
     *
     * @var        string
     */
    protected $name_e;

    /**
     * The value for the posid field.
     *
     * @var        string
     */
    protected $posid;

    /**
     * The value for the mdate field.
     *
     * @var        string
     */
    protected $mdate;

    /**
     * The value for the birthday field.
     *
     * @var        string
     */
    protected $birthday;

    /**
     * The value for the national field.
     *
     * @var        string
     */
    protected $national;

    /**
     * The value for the id_tax field.
     *
     * @var        string
     */
    protected $id_tax;

    /**
     * The value for the id_card field.
     *
     * @var        string
     */
    protected $id_card;

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
     * The value for the office_t field.
     *
     * @var        string
     */
    protected $office_t;

    /**
     * The value for the mobile field.
     *
     * @var        string
     */
    protected $mobile;

    /**
     * The value for the mcode_acc field.
     *
     * @var        string
     */
    protected $mcode_acc;

    /**
     * The value for the bonusrec field.
     *
     * @var        string
     */
    protected $bonusrec;

    /**
     * The value for the bankcode field.
     *
     * @var        string
     */
    protected $bankcode;

    /**
     * The value for the branch field.
     *
     * @var        string
     */
    protected $branch;

    /**
     * The value for the acc_type field.
     *
     * @var        string
     */
    protected $acc_type;

    /**
     * The value for the acc_no field.
     *
     * @var        string
     */
    protected $acc_no;

    /**
     * The value for the acc_name field.
     *
     * @var        string
     */
    protected $acc_name;

    /**
     * The value for the acc_prov field.
     *
     * @var        string
     */
    protected $acc_prov;

    /**
     * The value for the sv_code field.
     *
     * @var        string
     */
    protected $sv_code;

    /**
     * The value for the sp_code field.
     *
     * @var        string
     */
    protected $sp_code;

    /**
     * The value for the sp_name field.
     *
     * @var        string
     */
    protected $sp_name;

    /**
     * The value for the upa_code field.
     *
     * @var        string
     */
    protected $upa_code;

    /**
     * The value for the upa_name field.
     *
     * @var        string
     */
    protected $upa_name;

    /**
     * The value for the lr field.
     *
     * @var        int
     */
    protected $lr;

    /**
     * The value for the complete field.
     *
     * @var        string
     */
    protected $complete;

    /**
     * The value for the compdate field.
     *
     * @var        string
     */
    protected $compdate;

    /**
     * The value for the modate field.
     *
     * @var        string
     */
    protected $modate;

    /**
     * The value for the usercode field.
     *
     * @var        string
     */
    protected $usercode;

    /**
     * The value for the name_b field.
     *
     * @var        string
     */
    protected $name_b;

    /**
     * The value for the sex field.
     *
     * @var        string
     */
    protected $sex;

    /**
     * The value for the age field.
     *
     * @var        int
     */
    protected $age;

    /**
     * The value for the occupation field.
     *
     * @var        string
     */
    protected $occupation;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * The value for the mar_name field.
     *
     * @var        string
     */
    protected $mar_name;

    /**
     * The value for the mar_age field.
     *
     * @var        int
     */
    protected $mar_age;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the beneficiaries field.
     *
     * @var        string
     */
    protected $beneficiaries;

    /**
     * The value for the relation field.
     *
     * @var        string
     */
    protected $relation;

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
     * The value for the fax field.
     *
     * @var        string
     */
    protected $fax;

    /**
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the pos_cur field.
     *
     * @var        string
     */
    protected $pos_cur;

    /**
     * The value for the pos_cur1 field.
     *
     * Note: this column has a database default value of: 'S'
     * @var        string
     */
    protected $pos_cur1;

    /**
     * The value for the pos_cur2 field.
     *
     * @var        string
     */
    protected $pos_cur2;

    /**
     * The value for the pos_cur3 field.
     *
     * @var        string
     */
    protected $pos_cur3;

    /**
     * The value for the pos_cur4 field.
     *
     * @var        string
     */
    protected $pos_cur4;

    /**
     * The value for the rpos_cur4 field.
     *
     * @var        int
     */
    protected $rpos_cur4;

    /**
     * The value for the memdesc field.
     *
     * @var        string
     */
    protected $memdesc;

    /**
     * The value for the cmp field.
     *
     * @var        string
     */
    protected $cmp;

    /**
     * The value for the cmp2 field.
     *
     * @var        string
     */
    protected $cmp2;

    /**
     * The value for the cmp3 field.
     *
     * @var        string
     */
    protected $cmp3;

    /**
     * The value for the ccmp field.
     *
     * @var        string
     */
    protected $ccmp;

    /**
     * The value for the ccmp2 field.
     *
     * @var        string
     */
    protected $ccmp2;

    /**
     * The value for the ccmp3 field.
     *
     * @var        string
     */
    protected $ccmp3;

    /**
     * The value for the address field.
     *
     * @var        string
     */
    protected $address;

    /**
     * The value for the street field.
     *
     * @var        string
     */
    protected $street;

    /**
     * The value for the building field.
     *
     * @var        string
     */
    protected $building;

    /**
     * The value for the village field.
     *
     * @var        string
     */
    protected $village;

    /**
     * The value for the soi field.
     *
     * @var        string
     */
    protected $soi;

    /**
     * The value for the ewallet field.
     *
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the bmdate1 field.
     *
     * @var        string
     */
    protected $bmdate1;

    /**
     * The value for the bmdate2 field.
     *
     * @var        string
     */
    protected $bmdate2;

    /**
     * The value for the bmdate3 field.
     *
     * @var        string
     */
    protected $bmdate3;

    /**
     * The value for the cbmdate1 field.
     *
     * @var        string
     */
    protected $cbmdate1;

    /**
     * The value for the cbmdate2 field.
     *
     * @var        string
     */
    protected $cbmdate2;

    /**
     * The value for the cbmdate3 field.
     *
     * @var        string
     */
    protected $cbmdate3;

    /**
     * The value for the online field.
     *
     * @var        int
     */
    protected $online;

    /**
     * The value for the cname_f field.
     *
     * @var        string
     */
    protected $cname_f;

    /**
     * The value for the cname_t field.
     *
     * @var        string
     */
    protected $cname_t;

    /**
     * The value for the cname_e field.
     *
     * @var        string
     */
    protected $cname_e;

    /**
     * The value for the cname_b field.
     *
     * @var        string
     */
    protected $cname_b;

    /**
     * The value for the cbirthday field.
     *
     * @var        string
     */
    protected $cbirthday;

    /**
     * The value for the cnational field.
     *
     * @var        string
     */
    protected $cnational;

    /**
     * The value for the cid_tax field.
     *
     * @var        string
     */
    protected $cid_tax;

    /**
     * The value for the cid_card field.
     *
     * @var        string
     */
    protected $cid_card;

    /**
     * The value for the caddress field.
     *
     * @var        string
     */
    protected $caddress;

    /**
     * The value for the cbuilding field.
     *
     * @var        string
     */
    protected $cbuilding;

    /**
     * The value for the cvillage field.
     *
     * @var        string
     */
    protected $cvillage;

    /**
     * The value for the csoi field.
     *
     * @var        string
     */
    protected $csoi;

    /**
     * The value for the czip field.
     *
     * @var        string
     */
    protected $czip;

    /**
     * The value for the chome_t field.
     *
     * @var        string
     */
    protected $chome_t;

    /**
     * The value for the coffice_t field.
     *
     * @var        string
     */
    protected $coffice_t;

    /**
     * The value for the cmobile field.
     *
     * @var        string
     */
    protected $cmobile;

    /**
     * The value for the cfax field.
     *
     * @var        string
     */
    protected $cfax;

    /**
     * The value for the csex field.
     *
     * @var        string
     */
    protected $csex;

    /**
     * The value for the cemail field.
     *
     * @var        string
     */
    protected $cemail;

    /**
     * The value for the cdistrictid field.
     *
     * @var        int
     */
    protected $cdistrictid;

    /**
     * The value for the camphurid field.
     *
     * @var        int
     */
    protected $camphurid;

    /**
     * The value for the cprovinceid field.
     *
     * @var        int
     */
    protected $cprovinceid;

    /**
     * The value for the iname_f field.
     *
     * @var        string
     */
    protected $iname_f;

    /**
     * The value for the iname_t field.
     *
     * @var        string
     */
    protected $iname_t;

    /**
     * The value for the irelation field.
     *
     * @var        string
     */
    protected $irelation;

    /**
     * The value for the iphone field.
     *
     * @var        string
     */
    protected $iphone;

    /**
     * The value for the iid_card field.
     *
     * @var        string
     */
    protected $iid_card;

    /**
     * The value for the status_doc field.
     *
     * @var        int
     */
    protected $status_doc;

    /**
     * The value for the status_expire field.
     *
     * @var        int
     */
    protected $status_expire;

    /**
     * The value for the status_terminate field.
     *
     * @var        int
     */
    protected $status_terminate;

    /**
     * The value for the terminate_date field.
     *
     * @var        DateTime
     */
    protected $terminate_date;

    /**
     * The value for the status_suspend field.
     *
     * @var        int
     */
    protected $status_suspend;

    /**
     * The value for the suspend_date field.
     *
     * @var        DateTime
     */
    protected $suspend_date;

    /**
     * The value for the status_blacklist field.
     *
     * @var        int
     */
    protected $status_blacklist;

    /**
     * The value for the status_ato field.
     *
     * @var        int
     */
    protected $status_ato;

    /**
     * The value for the sletter field.
     *
     * @var        int
     */
    protected $sletter;

    /**
     * The value for the sinv_code field.
     *
     * @var        string
     */
    protected $sinv_code;

    /**
     * The value for the txtoption field.
     *
     * @var        string
     */
    protected $txtoption;

    /**
     * The value for the mcode_ref field.
     *
     * @var        string
     */
    protected $mcode_ref;

    /**
     * The value for the cancel field.
     *
     * @var        int
     */
    protected $cancel;

    /**
     * The value for the sbook field.
     *
     * @var        int
     */
    protected $sbook;

    /**
     * The value for the sbinv_code field.
     *
     * @var        string
     */
    protected $sbinv_code;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the cid_mobile field.
     *
     * @var        string
     */
    protected $cid_mobile;

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
     * The value for the voucher field.
     *
     * @var        string
     */
    protected $voucher;

    /**
     * The value for the manager field.
     *
     * @var        string
     */
    protected $manager;

    /**
     * The value for the mtype field.
     *
     * @var        string
     */
    protected $mtype;

    /**
     * The value for the uidbase field.
     *
     * @var        string
     */
    protected $uidbase;

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
        $this->pos_cur1 = 'S';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliMemberTmp object.
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
     * Compares this with another <code>AliMemberTmp</code> instance.  If
     * <code>obj</code> is an instance of <code>AliMemberTmp</code>, delegates to
     * <code>equals(AliMemberTmp)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliMemberTmp The current object, for fluid interface
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
     * Get the [transtype] column value.
     *
     * @return int
     */
    public function getTranstype()
    {
        return $this->transtype;
    }

    /**
     * Get the [paytype] column value.
     *
     * @return int
     */
    public function getPaytype()
    {
        return $this->paytype;
    }

    /**
     * Get the [optionally formatted] temporal [paydate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaydate($format = NULL)
    {
        if ($format === null) {
            return $this->paydate;
        } else {
            return $this->paydate instanceof \DateTimeInterface ? $this->paydate->format($format) : null;
        }
    }

    /**
     * Get the [credittype] column value.
     *
     * @return int
     */
    public function getCredittype()
    {
        return $this->credittype;
    }

    /**
     * Get the [sendtype] column value.
     *
     * @return int
     */
    public function getSendtype()
    {
        return $this->sendtype;
    }

    /**
     * Get the [cstreet] column value.
     *
     * @return string
     */
    public function getCstreet()
    {
        return $this->cstreet;
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
     * Get the [name_e] column value.
     *
     * @return string
     */
    public function getNameE()
    {
        return $this->name_e;
    }

    /**
     * Get the [posid] column value.
     *
     * @return string
     */
    public function getPosid()
    {
        return $this->posid;
    }

    /**
     * Get the [mdate] column value.
     *
     * @return string
     */
    public function getMdate()
    {
        return $this->mdate;
    }

    /**
     * Get the [birthday] column value.
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Get the [national] column value.
     *
     * @return string
     */
    public function getNational()
    {
        return $this->national;
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
     * Get the [id_card] column value.
     *
     * @return string
     */
    public function getIdCard()
    {
        return $this->id_card;
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
     * Get the [office_t] column value.
     *
     * @return string
     */
    public function getOfficeT()
    {
        return $this->office_t;
    }

    /**
     * Get the [mobile] column value.
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Get the [mcode_acc] column value.
     *
     * @return string
     */
    public function getMcodeAcc()
    {
        return $this->mcode_acc;
    }

    /**
     * Get the [bonusrec] column value.
     *
     * @return string
     */
    public function getBonusrec()
    {
        return $this->bonusrec;
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
     * Get the [branch] column value.
     *
     * @return string
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Get the [acc_type] column value.
     *
     * @return string
     */
    public function getAccType()
    {
        return $this->acc_type;
    }

    /**
     * Get the [acc_no] column value.
     *
     * @return string
     */
    public function getAccNo()
    {
        return $this->acc_no;
    }

    /**
     * Get the [acc_name] column value.
     *
     * @return string
     */
    public function getAccName()
    {
        return $this->acc_name;
    }

    /**
     * Get the [acc_prov] column value.
     *
     * @return string
     */
    public function getAccProv()
    {
        return $this->acc_prov;
    }

    /**
     * Get the [sv_code] column value.
     *
     * @return string
     */
    public function getSvCode()
    {
        return $this->sv_code;
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
     * Get the [sp_name] column value.
     *
     * @return string
     */
    public function getSpName()
    {
        return $this->sp_name;
    }

    /**
     * Get the [upa_code] column value.
     *
     * @return string
     */
    public function getUpaCode()
    {
        return $this->upa_code;
    }

    /**
     * Get the [upa_name] column value.
     *
     * @return string
     */
    public function getUpaName()
    {
        return $this->upa_name;
    }

    /**
     * Get the [lr] column value.
     *
     * @return int
     */
    public function getLr()
    {
        return $this->lr;
    }

    /**
     * Get the [complete] column value.
     *
     * @return string
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * Get the [compdate] column value.
     *
     * @return string
     */
    public function getCompdate()
    {
        return $this->compdate;
    }

    /**
     * Get the [modate] column value.
     *
     * @return string
     */
    public function getModate()
    {
        return $this->modate;
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
     * Get the [name_b] column value.
     *
     * @return string
     */
    public function getNameB()
    {
        return $this->name_b;
    }

    /**
     * Get the [sex] column value.
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Get the [age] column value.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [occupation] column value.
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
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
     * Get the [mar_name] column value.
     *
     * @return string
     */
    public function getMarName()
    {
        return $this->mar_name;
    }

    /**
     * Get the [mar_age] column value.
     *
     * @return int
     */
    public function getMarAge()
    {
        return $this->mar_age;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [beneficiaries] column value.
     *
     * @return string
     */
    public function getBeneficiaries()
    {
        return $this->beneficiaries;
    }

    /**
     * Get the [relation] column value.
     *
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
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
     * Get the [fax] column value.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
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
     * Get the [uid] column value.
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Get the [pos_cur] column value.
     *
     * @return string
     */
    public function getPosCur()
    {
        return $this->pos_cur;
    }

    /**
     * Get the [pos_cur1] column value.
     *
     * @return string
     */
    public function getPosCur1()
    {
        return $this->pos_cur1;
    }

    /**
     * Get the [pos_cur2] column value.
     *
     * @return string
     */
    public function getPosCur2()
    {
        return $this->pos_cur2;
    }

    /**
     * Get the [pos_cur3] column value.
     *
     * @return string
     */
    public function getPosCur3()
    {
        return $this->pos_cur3;
    }

    /**
     * Get the [pos_cur4] column value.
     *
     * @return string
     */
    public function getPosCur4()
    {
        return $this->pos_cur4;
    }

    /**
     * Get the [rpos_cur4] column value.
     *
     * @return int
     */
    public function getRposCur4()
    {
        return $this->rpos_cur4;
    }

    /**
     * Get the [memdesc] column value.
     *
     * @return string
     */
    public function getMemdesc()
    {
        return $this->memdesc;
    }

    /**
     * Get the [cmp] column value.
     *
     * @return string
     */
    public function getCmp()
    {
        return $this->cmp;
    }

    /**
     * Get the [cmp2] column value.
     *
     * @return string
     */
    public function getCmp2()
    {
        return $this->cmp2;
    }

    /**
     * Get the [cmp3] column value.
     *
     * @return string
     */
    public function getCmp3()
    {
        return $this->cmp3;
    }

    /**
     * Get the [ccmp] column value.
     *
     * @return string
     */
    public function getCcmp()
    {
        return $this->ccmp;
    }

    /**
     * Get the [ccmp2] column value.
     *
     * @return string
     */
    public function getCcmp2()
    {
        return $this->ccmp2;
    }

    /**
     * Get the [ccmp3] column value.
     *
     * @return string
     */
    public function getCcmp3()
    {
        return $this->ccmp3;
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
     * Get the [street] column value.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get the [building] column value.
     *
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Get the [village] column value.
     *
     * @return string
     */
    public function getVillage()
    {
        return $this->village;
    }

    /**
     * Get the [soi] column value.
     *
     * @return string
     */
    public function getSoi()
    {
        return $this->soi;
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
     * Get the [bmdate1] column value.
     *
     * @return string
     */
    public function getBmdate1()
    {
        return $this->bmdate1;
    }

    /**
     * Get the [bmdate2] column value.
     *
     * @return string
     */
    public function getBmdate2()
    {
        return $this->bmdate2;
    }

    /**
     * Get the [bmdate3] column value.
     *
     * @return string
     */
    public function getBmdate3()
    {
        return $this->bmdate3;
    }

    /**
     * Get the [cbmdate1] column value.
     *
     * @return string
     */
    public function getCbmdate1()
    {
        return $this->cbmdate1;
    }

    /**
     * Get the [cbmdate2] column value.
     *
     * @return string
     */
    public function getCbmdate2()
    {
        return $this->cbmdate2;
    }

    /**
     * Get the [cbmdate3] column value.
     *
     * @return string
     */
    public function getCbmdate3()
    {
        return $this->cbmdate3;
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
     * Get the [cname_f] column value.
     *
     * @return string
     */
    public function getCnameF()
    {
        return $this->cname_f;
    }

    /**
     * Get the [cname_t] column value.
     *
     * @return string
     */
    public function getCnameT()
    {
        return $this->cname_t;
    }

    /**
     * Get the [cname_e] column value.
     *
     * @return string
     */
    public function getCnameE()
    {
        return $this->cname_e;
    }

    /**
     * Get the [cname_b] column value.
     *
     * @return string
     */
    public function getCnameB()
    {
        return $this->cname_b;
    }

    /**
     * Get the [cbirthday] column value.
     *
     * @return string
     */
    public function getCbirthday()
    {
        return $this->cbirthday;
    }

    /**
     * Get the [cnational] column value.
     *
     * @return string
     */
    public function getCnational()
    {
        return $this->cnational;
    }

    /**
     * Get the [cid_tax] column value.
     *
     * @return string
     */
    public function getCidTax()
    {
        return $this->cid_tax;
    }

    /**
     * Get the [cid_card] column value.
     *
     * @return string
     */
    public function getCidCard()
    {
        return $this->cid_card;
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
     * Get the [cbuilding] column value.
     *
     * @return string
     */
    public function getCbuilding()
    {
        return $this->cbuilding;
    }

    /**
     * Get the [cvillage] column value.
     *
     * @return string
     */
    public function getCvillage()
    {
        return $this->cvillage;
    }

    /**
     * Get the [csoi] column value.
     *
     * @return string
     */
    public function getCsoi()
    {
        return $this->csoi;
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
     * Get the [chome_t] column value.
     *
     * @return string
     */
    public function getChomeT()
    {
        return $this->chome_t;
    }

    /**
     * Get the [coffice_t] column value.
     *
     * @return string
     */
    public function getCofficeT()
    {
        return $this->coffice_t;
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
     * Get the [cfax] column value.
     *
     * @return string
     */
    public function getCfax()
    {
        return $this->cfax;
    }

    /**
     * Get the [csex] column value.
     *
     * @return string
     */
    public function getCsex()
    {
        return $this->csex;
    }

    /**
     * Get the [cemail] column value.
     *
     * @return string
     */
    public function getCemail()
    {
        return $this->cemail;
    }

    /**
     * Get the [cdistrictid] column value.
     *
     * @return int
     */
    public function getCdistrictid()
    {
        return $this->cdistrictid;
    }

    /**
     * Get the [camphurid] column value.
     *
     * @return int
     */
    public function getCamphurid()
    {
        return $this->camphurid;
    }

    /**
     * Get the [cprovinceid] column value.
     *
     * @return int
     */
    public function getCprovinceid()
    {
        return $this->cprovinceid;
    }

    /**
     * Get the [iname_f] column value.
     *
     * @return string
     */
    public function getInameF()
    {
        return $this->iname_f;
    }

    /**
     * Get the [iname_t] column value.
     *
     * @return string
     */
    public function getInameT()
    {
        return $this->iname_t;
    }

    /**
     * Get the [irelation] column value.
     *
     * @return string
     */
    public function getIrelation()
    {
        return $this->irelation;
    }

    /**
     * Get the [iphone] column value.
     *
     * @return string
     */
    public function getIphone()
    {
        return $this->iphone;
    }

    /**
     * Get the [iid_card] column value.
     *
     * @return string
     */
    public function getIidCard()
    {
        return $this->iid_card;
    }

    /**
     * Get the [status_doc] column value.
     *
     * @return int
     */
    public function getStatusDoc()
    {
        return $this->status_doc;
    }

    /**
     * Get the [status_expire] column value.
     *
     * @return int
     */
    public function getStatusExpire()
    {
        return $this->status_expire;
    }

    /**
     * Get the [status_terminate] column value.
     *
     * @return int
     */
    public function getStatusTerminate()
    {
        return $this->status_terminate;
    }

    /**
     * Get the [optionally formatted] temporal [terminate_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTerminateDate($format = NULL)
    {
        if ($format === null) {
            return $this->terminate_date;
        } else {
            return $this->terminate_date instanceof \DateTimeInterface ? $this->terminate_date->format($format) : null;
        }
    }

    /**
     * Get the [status_suspend] column value.
     *
     * @return int
     */
    public function getStatusSuspend()
    {
        return $this->status_suspend;
    }

    /**
     * Get the [optionally formatted] temporal [suspend_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSuspendDate($format = NULL)
    {
        if ($format === null) {
            return $this->suspend_date;
        } else {
            return $this->suspend_date instanceof \DateTimeInterface ? $this->suspend_date->format($format) : null;
        }
    }

    /**
     * Get the [status_blacklist] column value.
     *
     * @return int
     */
    public function getStatusBlacklist()
    {
        return $this->status_blacklist;
    }

    /**
     * Get the [status_ato] column value.
     *
     * @return int
     */
    public function getStatusAto()
    {
        return $this->status_ato;
    }

    /**
     * Get the [sletter] column value.
     *
     * @return int
     */
    public function getSletter()
    {
        return $this->sletter;
    }

    /**
     * Get the [sinv_code] column value.
     *
     * @return string
     */
    public function getSinvCode()
    {
        return $this->sinv_code;
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
     * Get the [mcode_ref] column value.
     *
     * @return string
     */
    public function getMcodeRef()
    {
        return $this->mcode_ref;
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
     * Get the [sbook] column value.
     *
     * @return int
     */
    public function getSbook()
    {
        return $this->sbook;
    }

    /**
     * Get the [sbinv_code] column value.
     *
     * @return string
     */
    public function getSbinvCode()
    {
        return $this->sbinv_code;
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
     * Get the [cid_mobile] column value.
     *
     * @return string
     */
    public function getCidMobile()
    {
        return $this->cid_mobile;
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
     * Get the [voucher] column value.
     *
     * @return string
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * Get the [manager] column value.
     *
     * @return string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Get the [mtype] column value.
     *
     * @return string
     */
    public function getMtype()
    {
        return $this->mtype;
    }

    /**
     * Get the [uidbase] column value.
     *
     * @return string
     */
    public function getUidbase()
    {
        return $this->uidbase;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [transtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setTranstype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->transtype !== $v) {
            $this->transtype = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_TRANSTYPE] = true;
        }

        return $this;
    } // setTranstype()

    /**
     * Set the value of [paytype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPaytype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->paytype !== $v) {
            $this->paytype = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_PAYTYPE] = true;
        }

        return $this;
    } // setPaytype()

    /**
     * Sets the value of [paydate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPaydate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->paydate !== null || $dt !== null) {
            if ($this->paydate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->paydate->format("Y-m-d H:i:s.u")) {
                $this->paydate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliMemberTmpTableMap::COL_PAYDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPaydate()

    /**
     * Set the value of [credittype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCredittype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->credittype !== $v) {
            $this->credittype = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CREDITTYPE] = true;
        }

        return $this;
    } // setCredittype()

    /**
     * Set the value of [sendtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSendtype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sendtype !== $v) {
            $this->sendtype = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SENDTYPE] = true;
        }

        return $this;
    } // setSendtype()

    /**
     * Set the value of [cstreet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCstreet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cstreet !== $v) {
            $this->cstreet = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CSTREET] = true;
        }

        return $this;
    } // setCstreet()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [name_e] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setNameE($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_e !== $v) {
            $this->name_e = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_NAME_E] = true;
        }

        return $this;
    } // setNameE()

    /**
     * Set the value of [posid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPosid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->posid !== $v) {
            $this->posid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_POSID] = true;
        }

        return $this;
    } // setPosid()

    /**
     * Set the value of [mdate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mdate !== $v) {
            $this->mdate = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MDATE] = true;
        }

        return $this;
    } // setMdate()

    /**
     * Set the value of [birthday] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBirthday($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->birthday !== $v) {
            $this->birthday = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BIRTHDAY] = true;
        }

        return $this;
    } // setBirthday()

    /**
     * Set the value of [national] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setNational($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->national !== $v) {
            $this->national = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_NATIONAL] = true;
        }

        return $this;
    } // setNational()

    /**
     * Set the value of [id_tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setIdTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id_tax !== $v) {
            $this->id_tax = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ID_TAX] = true;
        }

        return $this;
    } // setIdTax()

    /**
     * Set the value of [id_card] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setIdCard($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id_card !== $v) {
            $this->id_card = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ID_CARD] = true;
        }

        return $this;
    } // setIdCard()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [home_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setHomeT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->home_t !== $v) {
            $this->home_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_HOME_T] = true;
        }

        return $this;
    } // setHomeT()

    /**
     * Set the value of [office_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setOfficeT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->office_t !== $v) {
            $this->office_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_OFFICE_T] = true;
        }

        return $this;
    } // setOfficeT()

    /**
     * Set the value of [mobile] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMobile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mobile !== $v) {
            $this->mobile = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MOBILE] = true;
        }

        return $this;
    } // setMobile()

    /**
     * Set the value of [mcode_acc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMcodeAcc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode_acc !== $v) {
            $this->mcode_acc = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MCODE_ACC] = true;
        }

        return $this;
    } // setMcodeAcc()

    /**
     * Set the value of [bonusrec] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBonusrec($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bonusrec !== $v) {
            $this->bonusrec = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BONUSREC] = true;
        }

        return $this;
    } // setBonusrec()

    /**
     * Set the value of [bankcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBankcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bankcode !== $v) {
            $this->bankcode = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BANKCODE] = true;
        }

        return $this;
    } // setBankcode()

    /**
     * Set the value of [branch] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBranch($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch !== $v) {
            $this->branch = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BRANCH] = true;
        }

        return $this;
    } // setBranch()

    /**
     * Set the value of [acc_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAccType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acc_type !== $v) {
            $this->acc_type = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ACC_TYPE] = true;
        }

        return $this;
    } // setAccType()

    /**
     * Set the value of [acc_no] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAccNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acc_no !== $v) {
            $this->acc_no = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ACC_NO] = true;
        }

        return $this;
    } // setAccNo()

    /**
     * Set the value of [acc_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAccName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acc_name !== $v) {
            $this->acc_name = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ACC_NAME] = true;
        }

        return $this;
    } // setAccName()

    /**
     * Set the value of [acc_prov] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAccProv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acc_prov !== $v) {
            $this->acc_prov = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ACC_PROV] = true;
        }

        return $this;
    } // setAccProv()

    /**
     * Set the value of [sv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sv_code !== $v) {
            $this->sv_code = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SV_CODE] = true;
        }

        return $this;
    } // setSvCode()

    /**
     * Set the value of [sp_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSpCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_code !== $v) {
            $this->sp_code = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SP_CODE] = true;
        }

        return $this;
    } // setSpCode()

    /**
     * Set the value of [sp_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSpName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_name !== $v) {
            $this->sp_name = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SP_NAME] = true;
        }

        return $this;
    } // setSpName()

    /**
     * Set the value of [upa_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setUpaCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upa_code !== $v) {
            $this->upa_code = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_UPA_CODE] = true;
        }

        return $this;
    } // setUpaCode()

    /**
     * Set the value of [upa_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setUpaName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upa_name !== $v) {
            $this->upa_name = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_UPA_NAME] = true;
        }

        return $this;
    } // setUpaName()

    /**
     * Set the value of [lr] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setLr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lr !== $v) {
            $this->lr = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_LR] = true;
        }

        return $this;
    } // setLr()

    /**
     * Set the value of [complete] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setComplete($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->complete !== $v) {
            $this->complete = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_COMPLETE] = true;
        }

        return $this;
    } // setComplete()

    /**
     * Set the value of [compdate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCompdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->compdate !== $v) {
            $this->compdate = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_COMPDATE] = true;
        }

        return $this;
    } // setCompdate()

    /**
     * Set the value of [modate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setModate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->modate !== $v) {
            $this->modate = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MODATE] = true;
        }

        return $this;
    } // setModate()

    /**
     * Set the value of [usercode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setUsercode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usercode !== $v) {
            $this->usercode = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_USERCODE] = true;
        }

        return $this;
    } // setUsercode()

    /**
     * Set the value of [name_b] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setNameB($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_b !== $v) {
            $this->name_b = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_NAME_B] = true;
        }

        return $this;
    } // setNameB()

    /**
     * Set the value of [sex] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SEX] = true;
        }

        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_AGE] = true;
        }

        return $this;
    } // setAge()

    /**
     * Set the value of [occupation] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setOccupation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->occupation !== $v) {
            $this->occupation = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_OCCUPATION] = true;
        }

        return $this;
    } // setOccupation()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [mar_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMarName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mar_name !== $v) {
            $this->mar_name = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MAR_NAME] = true;
        }

        return $this;
    } // setMarName()

    /**
     * Set the value of [mar_age] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMarAge($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->mar_age !== $v) {
            $this->mar_age = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MAR_AGE] = true;
        }

        return $this;
    } // setMarAge()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [beneficiaries] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBeneficiaries($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->beneficiaries !== $v) {
            $this->beneficiaries = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BENEFICIARIES] = true;
        }

        return $this;
    } // setBeneficiaries()

    /**
     * Set the value of [relation] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setRelation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->relation !== $v) {
            $this->relation = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_RELATION] = true;
        }

        return $this;
    } // setRelation()

    /**
     * Set the value of [districtid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setDistrictid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->districtid !== $v) {
            $this->districtid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_DISTRICTID] = true;
        }

        return $this;
    } // setDistrictid()

    /**
     * Set the value of [amphurid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAmphurid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amphurid !== $v) {
            $this->amphurid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_AMPHURID] = true;
        }

        return $this;
    } // setAmphurid()

    /**
     * Set the value of [provinceid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setProvinceid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->provinceid !== $v) {
            $this->provinceid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_PROVINCEID] = true;
        }

        return $this;
    } // setProvinceid()

    /**
     * Set the value of [fax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_FAX] = true;
        }

        return $this;
    } // setFax()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [pos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPosCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur !== $v) {
            $this->pos_cur = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_POS_CUR] = true;
        }

        return $this;
    } // setPosCur()

    /**
     * Set the value of [pos_cur1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPosCur1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur1 !== $v) {
            $this->pos_cur1 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_POS_CUR1] = true;
        }

        return $this;
    } // setPosCur1()

    /**
     * Set the value of [pos_cur2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPosCur2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur2 !== $v) {
            $this->pos_cur2 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_POS_CUR2] = true;
        }

        return $this;
    } // setPosCur2()

    /**
     * Set the value of [pos_cur3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPosCur3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur3 !== $v) {
            $this->pos_cur3 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_POS_CUR3] = true;
        }

        return $this;
    } // setPosCur3()

    /**
     * Set the value of [pos_cur4] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setPosCur4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur4 !== $v) {
            $this->pos_cur4 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_POS_CUR4] = true;
        }

        return $this;
    } // setPosCur4()

    /**
     * Set the value of [rpos_cur4] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setRposCur4($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rpos_cur4 !== $v) {
            $this->rpos_cur4 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_RPOS_CUR4] = true;
        }

        return $this;
    } // setRposCur4()

    /**
     * Set the value of [memdesc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMemdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->memdesc !== $v) {
            $this->memdesc = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MEMDESC] = true;
        }

        return $this;
    } // setMemdesc()

    /**
     * Set the value of [cmp] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCmp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cmp !== $v) {
            $this->cmp = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CMP] = true;
        }

        return $this;
    } // setCmp()

    /**
     * Set the value of [cmp2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCmp2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cmp2 !== $v) {
            $this->cmp2 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CMP2] = true;
        }

        return $this;
    } // setCmp2()

    /**
     * Set the value of [cmp3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCmp3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cmp3 !== $v) {
            $this->cmp3 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CMP3] = true;
        }

        return $this;
    } // setCmp3()

    /**
     * Set the value of [ccmp] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCcmp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ccmp !== $v) {
            $this->ccmp = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CCMP] = true;
        }

        return $this;
    } // setCcmp()

    /**
     * Set the value of [ccmp2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCcmp2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ccmp2 !== $v) {
            $this->ccmp2 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CCMP2] = true;
        }

        return $this;
    } // setCcmp2()

    /**
     * Set the value of [ccmp3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCcmp3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ccmp3 !== $v) {
            $this->ccmp3 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CCMP3] = true;
        }

        return $this;
    } // setCcmp3()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ADDRESS] = true;
        }

        return $this;
    } // setAddress()

    /**
     * Set the value of [street] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStreet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->street !== $v) {
            $this->street = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STREET] = true;
        }

        return $this;
    } // setStreet()

    /**
     * Set the value of [building] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBuilding($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->building !== $v) {
            $this->building = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BUILDING] = true;
        }

        return $this;
    } // setBuilding()

    /**
     * Set the value of [village] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setVillage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->village !== $v) {
            $this->village = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_VILLAGE] = true;
        }

        return $this;
    } // setVillage()

    /**
     * Set the value of [soi] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSoi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->soi !== $v) {
            $this->soi = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SOI] = true;
        }

        return $this;
    } // setSoi()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [bmdate1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBmdate1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bmdate1 !== $v) {
            $this->bmdate1 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BMDATE1] = true;
        }

        return $this;
    } // setBmdate1()

    /**
     * Set the value of [bmdate2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBmdate2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bmdate2 !== $v) {
            $this->bmdate2 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BMDATE2] = true;
        }

        return $this;
    } // setBmdate2()

    /**
     * Set the value of [bmdate3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBmdate3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bmdate3 !== $v) {
            $this->bmdate3 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BMDATE3] = true;
        }

        return $this;
    } // setBmdate3()

    /**
     * Set the value of [cbmdate1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCbmdate1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cbmdate1 !== $v) {
            $this->cbmdate1 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CBMDATE1] = true;
        }

        return $this;
    } // setCbmdate1()

    /**
     * Set the value of [cbmdate2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCbmdate2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cbmdate2 !== $v) {
            $this->cbmdate2 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CBMDATE2] = true;
        }

        return $this;
    } // setCbmdate2()

    /**
     * Set the value of [cbmdate3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCbmdate3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cbmdate3 !== $v) {
            $this->cbmdate3 = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CBMDATE3] = true;
        }

        return $this;
    } // setCbmdate3()

    /**
     * Set the value of [online] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setOnline($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->online !== $v) {
            $this->online = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_ONLINE] = true;
        }

        return $this;
    } // setOnline()

    /**
     * Set the value of [cname_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCnameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cname_f !== $v) {
            $this->cname_f = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CNAME_F] = true;
        }

        return $this;
    } // setCnameF()

    /**
     * Set the value of [cname_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCnameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cname_t !== $v) {
            $this->cname_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CNAME_T] = true;
        }

        return $this;
    } // setCnameT()

    /**
     * Set the value of [cname_e] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCnameE($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cname_e !== $v) {
            $this->cname_e = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CNAME_E] = true;
        }

        return $this;
    } // setCnameE()

    /**
     * Set the value of [cname_b] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCnameB($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cname_b !== $v) {
            $this->cname_b = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CNAME_B] = true;
        }

        return $this;
    } // setCnameB()

    /**
     * Set the value of [cbirthday] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCbirthday($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cbirthday !== $v) {
            $this->cbirthday = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CBIRTHDAY] = true;
        }

        return $this;
    } // setCbirthday()

    /**
     * Set the value of [cnational] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCnational($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cnational !== $v) {
            $this->cnational = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CNATIONAL] = true;
        }

        return $this;
    } // setCnational()

    /**
     * Set the value of [cid_tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCidTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cid_tax !== $v) {
            $this->cid_tax = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CID_TAX] = true;
        }

        return $this;
    } // setCidTax()

    /**
     * Set the value of [cid_card] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCidCard($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cid_card !== $v) {
            $this->cid_card = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CID_CARD] = true;
        }

        return $this;
    } // setCidCard()

    /**
     * Set the value of [caddress] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caddress !== $v) {
            $this->caddress = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CADDRESS] = true;
        }

        return $this;
    } // setCaddress()

    /**
     * Set the value of [cbuilding] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCbuilding($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cbuilding !== $v) {
            $this->cbuilding = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CBUILDING] = true;
        }

        return $this;
    } // setCbuilding()

    /**
     * Set the value of [cvillage] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCvillage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cvillage !== $v) {
            $this->cvillage = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CVILLAGE] = true;
        }

        return $this;
    } // setCvillage()

    /**
     * Set the value of [csoi] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCsoi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->csoi !== $v) {
            $this->csoi = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CSOI] = true;
        }

        return $this;
    } // setCsoi()

    /**
     * Set the value of [czip] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->czip !== $v) {
            $this->czip = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CZIP] = true;
        }

        return $this;
    } // setCzip()

    /**
     * Set the value of [chome_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setChomeT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chome_t !== $v) {
            $this->chome_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CHOME_T] = true;
        }

        return $this;
    } // setChomeT()

    /**
     * Set the value of [coffice_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCofficeT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->coffice_t !== $v) {
            $this->coffice_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_COFFICE_T] = true;
        }

        return $this;
    } // setCofficeT()

    /**
     * Set the value of [cmobile] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCmobile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cmobile !== $v) {
            $this->cmobile = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CMOBILE] = true;
        }

        return $this;
    } // setCmobile()

    /**
     * Set the value of [cfax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCfax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cfax !== $v) {
            $this->cfax = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CFAX] = true;
        }

        return $this;
    } // setCfax()

    /**
     * Set the value of [csex] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCsex($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->csex !== $v) {
            $this->csex = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CSEX] = true;
        }

        return $this;
    } // setCsex()

    /**
     * Set the value of [cemail] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCemail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cemail !== $v) {
            $this->cemail = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CEMAIL] = true;
        }

        return $this;
    } // setCemail()

    /**
     * Set the value of [cdistrictid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCdistrictid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cdistrictid !== $v) {
            $this->cdistrictid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CDISTRICTID] = true;
        }

        return $this;
    } // setCdistrictid()

    /**
     * Set the value of [camphurid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCamphurid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->camphurid !== $v) {
            $this->camphurid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CAMPHURID] = true;
        }

        return $this;
    } // setCamphurid()

    /**
     * Set the value of [cprovinceid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCprovinceid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cprovinceid !== $v) {
            $this->cprovinceid = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CPROVINCEID] = true;
        }

        return $this;
    } // setCprovinceid()

    /**
     * Set the value of [iname_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setInameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iname_f !== $v) {
            $this->iname_f = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_INAME_F] = true;
        }

        return $this;
    } // setInameF()

    /**
     * Set the value of [iname_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setInameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iname_t !== $v) {
            $this->iname_t = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_INAME_T] = true;
        }

        return $this;
    } // setInameT()

    /**
     * Set the value of [irelation] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setIrelation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->irelation !== $v) {
            $this->irelation = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_IRELATION] = true;
        }

        return $this;
    } // setIrelation()

    /**
     * Set the value of [iphone] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setIphone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iphone !== $v) {
            $this->iphone = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_IPHONE] = true;
        }

        return $this;
    } // setIphone()

    /**
     * Set the value of [iid_card] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setIidCard($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iid_card !== $v) {
            $this->iid_card = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_IID_CARD] = true;
        }

        return $this;
    } // setIidCard()

    /**
     * Set the value of [status_doc] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatusDoc($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_doc !== $v) {
            $this->status_doc = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS_DOC] = true;
        }

        return $this;
    } // setStatusDoc()

    /**
     * Set the value of [status_expire] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatusExpire($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_expire !== $v) {
            $this->status_expire = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS_EXPIRE] = true;
        }

        return $this;
    } // setStatusExpire()

    /**
     * Set the value of [status_terminate] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatusTerminate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_terminate !== $v) {
            $this->status_terminate = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS_TERMINATE] = true;
        }

        return $this;
    } // setStatusTerminate()

    /**
     * Sets the value of [terminate_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setTerminateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->terminate_date !== null || $dt !== null) {
            if ($this->terminate_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->terminate_date->format("Y-m-d H:i:s.u")) {
                $this->terminate_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliMemberTmpTableMap::COL_TERMINATE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTerminateDate()

    /**
     * Set the value of [status_suspend] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatusSuspend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_suspend !== $v) {
            $this->status_suspend = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS_SUSPEND] = true;
        }

        return $this;
    } // setStatusSuspend()

    /**
     * Sets the value of [suspend_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSuspendDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->suspend_date !== null || $dt !== null) {
            if ($this->suspend_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->suspend_date->format("Y-m-d H:i:s.u")) {
                $this->suspend_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliMemberTmpTableMap::COL_SUSPEND_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSuspendDate()

    /**
     * Set the value of [status_blacklist] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatusBlacklist($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_blacklist !== $v) {
            $this->status_blacklist = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS_BLACKLIST] = true;
        }

        return $this;
    } // setStatusBlacklist()

    /**
     * Set the value of [status_ato] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setStatusAto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_ato !== $v) {
            $this->status_ato = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_STATUS_ATO] = true;
        }

        return $this;
    } // setStatusAto()

    /**
     * Set the value of [sletter] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSletter($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sletter !== $v) {
            $this->sletter = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SLETTER] = true;
        }

        return $this;
    } // setSletter()

    /**
     * Set the value of [sinv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSinvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sinv_code !== $v) {
            $this->sinv_code = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SINV_CODE] = true;
        }

        return $this;
    } // setSinvCode()

    /**
     * Set the value of [txtoption] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setTxtoption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtoption !== $v) {
            $this->txtoption = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_TXTOPTION] = true;
        }

        return $this;
    } // setTxtoption()

    /**
     * Set the value of [mcode_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMcodeRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode_ref !== $v) {
            $this->mcode_ref = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MCODE_REF] = true;
        }

        return $this;
    } // setMcodeRef()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [sbook] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSbook($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sbook !== $v) {
            $this->sbook = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SBOOK] = true;
        }

        return $this;
    } // setSbook()

    /**
     * Set the value of [sbinv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setSbinvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sbinv_code !== $v) {
            $this->sbinv_code = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_SBINV_CODE] = true;
        }

        return $this;
    } // setSbinvCode()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [cid_mobile] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setCidMobile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cid_mobile !== $v) {
            $this->cid_mobile = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_CID_MOBILE] = true;
        }

        return $this;
    } // setCidMobile()

    /**
     * Set the value of [bewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBewallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bewallet !== $v) {
            $this->bewallet = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BEWALLET] = true;
        }

        return $this;
    } // setBewallet()

    /**
     * Set the value of [bvoucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setBvoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bvoucher !== $v) {
            $this->bvoucher = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_BVOUCHER] = true;
        }

        return $this;
    } // setBvoucher()

    /**
     * Set the value of [voucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setVoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->voucher !== $v) {
            $this->voucher = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_VOUCHER] = true;
        }

        return $this;
    } // setVoucher()

    /**
     * Set the value of [manager] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setManager($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->manager !== $v) {
            $this->manager = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MANAGER] = true;
        }

        return $this;
    } // setManager()

    /**
     * Set the value of [mtype] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setMtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mtype !== $v) {
            $this->mtype = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_MTYPE] = true;
        }

        return $this;
    } // setMtype()

    /**
     * Set the value of [uidbase] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object (for fluent API support)
     */
    public function setUidbase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uidbase !== $v) {
            $this->uidbase = $v;
            $this->modifiedColumns[AliMemberTmpTableMap::COL_UIDBASE] = true;
        }

        return $this;
    } // setUidbase()

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
            if ($this->pos_cur1 !== 'S') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliMemberTmpTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliMemberTmpTableMap::translateFieldName('Transtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->transtype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliMemberTmpTableMap::translateFieldName('Paytype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paytype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliMemberTmpTableMap::translateFieldName('Paydate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->paydate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliMemberTmpTableMap::translateFieldName('Credittype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->credittype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliMemberTmpTableMap::translateFieldName('Sendtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sendtype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliMemberTmpTableMap::translateFieldName('Cstreet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cstreet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliMemberTmpTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliMemberTmpTableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliMemberTmpTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliMemberTmpTableMap::translateFieldName('NameE', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_e = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliMemberTmpTableMap::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->posid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliMemberTmpTableMap::translateFieldName('Mdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliMemberTmpTableMap::translateFieldName('Birthday', TableMap::TYPE_PHPNAME, $indexType)];
            $this->birthday = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliMemberTmpTableMap::translateFieldName('National', TableMap::TYPE_PHPNAME, $indexType)];
            $this->national = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliMemberTmpTableMap::translateFieldName('IdTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliMemberTmpTableMap::translateFieldName('IdCard', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_card = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliMemberTmpTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliMemberTmpTableMap::translateFieldName('HomeT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->home_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliMemberTmpTableMap::translateFieldName('OfficeT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->office_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliMemberTmpTableMap::translateFieldName('Mobile', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mobile = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliMemberTmpTableMap::translateFieldName('McodeAcc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode_acc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliMemberTmpTableMap::translateFieldName('Bonusrec', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bonusrec = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliMemberTmpTableMap::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bankcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliMemberTmpTableMap::translateFieldName('Branch', TableMap::TYPE_PHPNAME, $indexType)];
            $this->branch = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliMemberTmpTableMap::translateFieldName('AccType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acc_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliMemberTmpTableMap::translateFieldName('AccNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acc_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliMemberTmpTableMap::translateFieldName('AccName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acc_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliMemberTmpTableMap::translateFieldName('AccProv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acc_prov = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliMemberTmpTableMap::translateFieldName('SvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliMemberTmpTableMap::translateFieldName('SpCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliMemberTmpTableMap::translateFieldName('SpName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliMemberTmpTableMap::translateFieldName('UpaCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upa_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliMemberTmpTableMap::translateFieldName('UpaName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upa_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliMemberTmpTableMap::translateFieldName('Lr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliMemberTmpTableMap::translateFieldName('Complete', TableMap::TYPE_PHPNAME, $indexType)];
            $this->complete = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliMemberTmpTableMap::translateFieldName('Compdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->compdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliMemberTmpTableMap::translateFieldName('Modate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->modate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliMemberTmpTableMap::translateFieldName('Usercode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usercode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliMemberTmpTableMap::translateFieldName('NameB', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_b = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliMemberTmpTableMap::translateFieldName('Sex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sex = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliMemberTmpTableMap::translateFieldName('Age', TableMap::TYPE_PHPNAME, $indexType)];
            $this->age = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : AliMemberTmpTableMap::translateFieldName('Occupation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->occupation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : AliMemberTmpTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : AliMemberTmpTableMap::translateFieldName('MarName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mar_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : AliMemberTmpTableMap::translateFieldName('MarAge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mar_age = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : AliMemberTmpTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : AliMemberTmpTableMap::translateFieldName('Beneficiaries', TableMap::TYPE_PHPNAME, $indexType)];
            $this->beneficiaries = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : AliMemberTmpTableMap::translateFieldName('Relation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->relation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : AliMemberTmpTableMap::translateFieldName('Districtid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->districtid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : AliMemberTmpTableMap::translateFieldName('Amphurid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amphurid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : AliMemberTmpTableMap::translateFieldName('Provinceid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->provinceid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : AliMemberTmpTableMap::translateFieldName('Fax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : AliMemberTmpTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : AliMemberTmpTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : AliMemberTmpTableMap::translateFieldName('PosCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : AliMemberTmpTableMap::translateFieldName('PosCur1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : AliMemberTmpTableMap::translateFieldName('PosCur2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : AliMemberTmpTableMap::translateFieldName('PosCur3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : AliMemberTmpTableMap::translateFieldName('PosCur4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : AliMemberTmpTableMap::translateFieldName('RposCur4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rpos_cur4 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : AliMemberTmpTableMap::translateFieldName('Memdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->memdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : AliMemberTmpTableMap::translateFieldName('Cmp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cmp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : AliMemberTmpTableMap::translateFieldName('Cmp2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cmp2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : AliMemberTmpTableMap::translateFieldName('Cmp3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cmp3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 65 + $startcol : AliMemberTmpTableMap::translateFieldName('Ccmp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ccmp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 66 + $startcol : AliMemberTmpTableMap::translateFieldName('Ccmp2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ccmp2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 67 + $startcol : AliMemberTmpTableMap::translateFieldName('Ccmp3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ccmp3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 68 + $startcol : AliMemberTmpTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 69 + $startcol : AliMemberTmpTableMap::translateFieldName('Street', TableMap::TYPE_PHPNAME, $indexType)];
            $this->street = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 70 + $startcol : AliMemberTmpTableMap::translateFieldName('Building', TableMap::TYPE_PHPNAME, $indexType)];
            $this->building = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 71 + $startcol : AliMemberTmpTableMap::translateFieldName('Village', TableMap::TYPE_PHPNAME, $indexType)];
            $this->village = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 72 + $startcol : AliMemberTmpTableMap::translateFieldName('Soi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->soi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 73 + $startcol : AliMemberTmpTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 74 + $startcol : AliMemberTmpTableMap::translateFieldName('Bmdate1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bmdate1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 75 + $startcol : AliMemberTmpTableMap::translateFieldName('Bmdate2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bmdate2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 76 + $startcol : AliMemberTmpTableMap::translateFieldName('Bmdate3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bmdate3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 77 + $startcol : AliMemberTmpTableMap::translateFieldName('Cbmdate1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cbmdate1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 78 + $startcol : AliMemberTmpTableMap::translateFieldName('Cbmdate2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cbmdate2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 79 + $startcol : AliMemberTmpTableMap::translateFieldName('Cbmdate3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cbmdate3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 80 + $startcol : AliMemberTmpTableMap::translateFieldName('Online', TableMap::TYPE_PHPNAME, $indexType)];
            $this->online = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 81 + $startcol : AliMemberTmpTableMap::translateFieldName('CnameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cname_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 82 + $startcol : AliMemberTmpTableMap::translateFieldName('CnameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cname_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 83 + $startcol : AliMemberTmpTableMap::translateFieldName('CnameE', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cname_e = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 84 + $startcol : AliMemberTmpTableMap::translateFieldName('CnameB', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cname_b = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 85 + $startcol : AliMemberTmpTableMap::translateFieldName('Cbirthday', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cbirthday = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 86 + $startcol : AliMemberTmpTableMap::translateFieldName('Cnational', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cnational = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 87 + $startcol : AliMemberTmpTableMap::translateFieldName('CidTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cid_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 88 + $startcol : AliMemberTmpTableMap::translateFieldName('CidCard', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cid_card = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 89 + $startcol : AliMemberTmpTableMap::translateFieldName('Caddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 90 + $startcol : AliMemberTmpTableMap::translateFieldName('Cbuilding', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cbuilding = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 91 + $startcol : AliMemberTmpTableMap::translateFieldName('Cvillage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cvillage = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 92 + $startcol : AliMemberTmpTableMap::translateFieldName('Csoi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->csoi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 93 + $startcol : AliMemberTmpTableMap::translateFieldName('Czip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->czip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 94 + $startcol : AliMemberTmpTableMap::translateFieldName('ChomeT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chome_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 95 + $startcol : AliMemberTmpTableMap::translateFieldName('CofficeT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->coffice_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 96 + $startcol : AliMemberTmpTableMap::translateFieldName('Cmobile', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cmobile = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 97 + $startcol : AliMemberTmpTableMap::translateFieldName('Cfax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cfax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 98 + $startcol : AliMemberTmpTableMap::translateFieldName('Csex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->csex = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 99 + $startcol : AliMemberTmpTableMap::translateFieldName('Cemail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cemail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 100 + $startcol : AliMemberTmpTableMap::translateFieldName('Cdistrictid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdistrictid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 101 + $startcol : AliMemberTmpTableMap::translateFieldName('Camphurid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->camphurid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 102 + $startcol : AliMemberTmpTableMap::translateFieldName('Cprovinceid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cprovinceid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 103 + $startcol : AliMemberTmpTableMap::translateFieldName('InameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iname_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 104 + $startcol : AliMemberTmpTableMap::translateFieldName('InameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iname_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 105 + $startcol : AliMemberTmpTableMap::translateFieldName('Irelation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->irelation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 106 + $startcol : AliMemberTmpTableMap::translateFieldName('Iphone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iphone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 107 + $startcol : AliMemberTmpTableMap::translateFieldName('IidCard', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iid_card = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 108 + $startcol : AliMemberTmpTableMap::translateFieldName('StatusDoc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_doc = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 109 + $startcol : AliMemberTmpTableMap::translateFieldName('StatusExpire', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_expire = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 110 + $startcol : AliMemberTmpTableMap::translateFieldName('StatusTerminate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_terminate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 111 + $startcol : AliMemberTmpTableMap::translateFieldName('TerminateDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->terminate_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 112 + $startcol : AliMemberTmpTableMap::translateFieldName('StatusSuspend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_suspend = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 113 + $startcol : AliMemberTmpTableMap::translateFieldName('SuspendDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->suspend_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 114 + $startcol : AliMemberTmpTableMap::translateFieldName('StatusBlacklist', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_blacklist = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 115 + $startcol : AliMemberTmpTableMap::translateFieldName('StatusAto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_ato = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 116 + $startcol : AliMemberTmpTableMap::translateFieldName('Sletter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sletter = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 117 + $startcol : AliMemberTmpTableMap::translateFieldName('SinvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sinv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 118 + $startcol : AliMemberTmpTableMap::translateFieldName('Txtoption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtoption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 119 + $startcol : AliMemberTmpTableMap::translateFieldName('McodeRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 120 + $startcol : AliMemberTmpTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 121 + $startcol : AliMemberTmpTableMap::translateFieldName('Sbook', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sbook = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 122 + $startcol : AliMemberTmpTableMap::translateFieldName('SbinvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sbinv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 123 + $startcol : AliMemberTmpTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 124 + $startcol : AliMemberTmpTableMap::translateFieldName('CidMobile', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cid_mobile = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 125 + $startcol : AliMemberTmpTableMap::translateFieldName('Bewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 126 + $startcol : AliMemberTmpTableMap::translateFieldName('Bvoucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bvoucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 127 + $startcol : AliMemberTmpTableMap::translateFieldName('Voucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->voucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 128 + $startcol : AliMemberTmpTableMap::translateFieldName('Manager', TableMap::TYPE_PHPNAME, $indexType)];
            $this->manager = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 129 + $startcol : AliMemberTmpTableMap::translateFieldName('Mtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 130 + $startcol : AliMemberTmpTableMap::translateFieldName('Uidbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uidbase = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 131; // 131 = AliMemberTmpTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliMemberTmp'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliMemberTmpQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliMemberTmp::setDeleted()
     * @see AliMemberTmp::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliMemberTmpQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTmpTableMap::DATABASE_NAME);
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
                AliMemberTmpTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliMemberTmpTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliMemberTmpTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_TRANSTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'transtype';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_PAYTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'paytype';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_PAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'paydate';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CREDITTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'credittype';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SENDTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sendtype';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CSTREET)) {
            $modifiedColumns[':p' . $index++]  = 'cstreet';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_E)) {
            $modifiedColumns[':p' . $index++]  = 'name_e';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POSID)) {
            $modifiedColumns[':p' . $index++]  = 'posid';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MDATE)) {
            $modifiedColumns[':p' . $index++]  = 'mdate';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BIRTHDAY)) {
            $modifiedColumns[':p' . $index++]  = 'birthday';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NATIONAL)) {
            $modifiedColumns[':p' . $index++]  = 'national';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ID_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'id_tax';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ID_CARD)) {
            $modifiedColumns[':p' . $index++]  = 'id_card';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'zip';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_HOME_T)) {
            $modifiedColumns[':p' . $index++]  = 'home_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_OFFICE_T)) {
            $modifiedColumns[':p' . $index++]  = 'office_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MOBILE)) {
            $modifiedColumns[':p' . $index++]  = 'mobile';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MCODE_ACC)) {
            $modifiedColumns[':p' . $index++]  = 'mcode_acc';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BONUSREC)) {
            $modifiedColumns[':p' . $index++]  = 'bonusrec';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BANKCODE)) {
            $modifiedColumns[':p' . $index++]  = 'bankcode';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BRANCH)) {
            $modifiedColumns[':p' . $index++]  = 'branch';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'acc_type';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_NO)) {
            $modifiedColumns[':p' . $index++]  = 'acc_no';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'acc_name';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_PROV)) {
            $modifiedColumns[':p' . $index++]  = 'acc_prov';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sv_code';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sp_code';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SP_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'sp_name';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UPA_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'upa_code';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UPA_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'upa_name';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_LR)) {
            $modifiedColumns[':p' . $index++]  = 'lr';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_COMPLETE)) {
            $modifiedColumns[':p' . $index++]  = 'complete';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_COMPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'compdate';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MODATE)) {
            $modifiedColumns[':p' . $index++]  = 'modate';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_USERCODE)) {
            $modifiedColumns[':p' . $index++]  = 'usercode';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_B)) {
            $modifiedColumns[':p' . $index++]  = 'name_b';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SEX)) {
            $modifiedColumns[':p' . $index++]  = 'sex';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_AGE)) {
            $modifiedColumns[':p' . $index++]  = 'age';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_OCCUPATION)) {
            $modifiedColumns[':p' . $index++]  = 'occupation';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MAR_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'mar_name';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MAR_AGE)) {
            $modifiedColumns[':p' . $index++]  = 'mar_age';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BENEFICIARIES)) {
            $modifiedColumns[':p' . $index++]  = 'beneficiaries';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_RELATION)) {
            $modifiedColumns[':p' . $index++]  = 'relation';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_DISTRICTID)) {
            $modifiedColumns[':p' . $index++]  = 'districtId';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_AMPHURID)) {
            $modifiedColumns[':p' . $index++]  = 'amphurId';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_PROVINCEID)) {
            $modifiedColumns[':p' . $index++]  = 'provinceId';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_FAX)) {
            $modifiedColumns[':p' . $index++]  = 'fax';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR1)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur1';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR2)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur2';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR3)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur3';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR4)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur4';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_RPOS_CUR4)) {
            $modifiedColumns[':p' . $index++]  = 'rpos_cur4';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MEMDESC)) {
            $modifiedColumns[':p' . $index++]  = 'memdesc';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMP)) {
            $modifiedColumns[':p' . $index++]  = 'cmp';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMP2)) {
            $modifiedColumns[':p' . $index++]  = 'cmp2';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMP3)) {
            $modifiedColumns[':p' . $index++]  = 'cmp3';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CCMP)) {
            $modifiedColumns[':p' . $index++]  = 'ccmp';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CCMP2)) {
            $modifiedColumns[':p' . $index++]  = 'ccmp2';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CCMP3)) {
            $modifiedColumns[':p' . $index++]  = 'ccmp3';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'address';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STREET)) {
            $modifiedColumns[':p' . $index++]  = 'street';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BUILDING)) {
            $modifiedColumns[':p' . $index++]  = 'building';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_VILLAGE)) {
            $modifiedColumns[':p' . $index++]  = 'village';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SOI)) {
            $modifiedColumns[':p' . $index++]  = 'soi';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BMDATE1)) {
            $modifiedColumns[':p' . $index++]  = 'bmdate1';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BMDATE2)) {
            $modifiedColumns[':p' . $index++]  = 'bmdate2';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BMDATE3)) {
            $modifiedColumns[':p' . $index++]  = 'bmdate3';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBMDATE1)) {
            $modifiedColumns[':p' . $index++]  = 'cbmdate1';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBMDATE2)) {
            $modifiedColumns[':p' . $index++]  = 'cbmdate2';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBMDATE3)) {
            $modifiedColumns[':p' . $index++]  = 'cbmdate3';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ONLINE)) {
            $modifiedColumns[':p' . $index++]  = 'online';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'cname_f';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'cname_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_E)) {
            $modifiedColumns[':p' . $index++]  = 'cname_e';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_B)) {
            $modifiedColumns[':p' . $index++]  = 'cname_b';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBIRTHDAY)) {
            $modifiedColumns[':p' . $index++]  = 'cbirthday';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNATIONAL)) {
            $modifiedColumns[':p' . $index++]  = 'cnational';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CID_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'cid_tax';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CID_CARD)) {
            $modifiedColumns[':p' . $index++]  = 'cid_card';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'caddress';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBUILDING)) {
            $modifiedColumns[':p' . $index++]  = 'cbuilding';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CVILLAGE)) {
            $modifiedColumns[':p' . $index++]  = 'cvillage';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CSOI)) {
            $modifiedColumns[':p' . $index++]  = 'csoi';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CZIP)) {
            $modifiedColumns[':p' . $index++]  = 'czip';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CHOME_T)) {
            $modifiedColumns[':p' . $index++]  = 'chome_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_COFFICE_T)) {
            $modifiedColumns[':p' . $index++]  = 'coffice_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMOBILE)) {
            $modifiedColumns[':p' . $index++]  = 'cmobile';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CFAX)) {
            $modifiedColumns[':p' . $index++]  = 'cfax';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CSEX)) {
            $modifiedColumns[':p' . $index++]  = 'csex';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CEMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'cemail';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CDISTRICTID)) {
            $modifiedColumns[':p' . $index++]  = 'cdistrictId';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CAMPHURID)) {
            $modifiedColumns[':p' . $index++]  = 'camphurId';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CPROVINCEID)) {
            $modifiedColumns[':p' . $index++]  = 'cprovinceId';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_INAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'iname_f';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_INAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'iname_t';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_IRELATION)) {
            $modifiedColumns[':p' . $index++]  = 'irelation';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_IPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'iphone';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_IID_CARD)) {
            $modifiedColumns[':p' . $index++]  = 'iid_card';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_DOC)) {
            $modifiedColumns[':p' . $index++]  = 'status_doc';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_EXPIRE)) {
            $modifiedColumns[':p' . $index++]  = 'status_expire';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_TERMINATE)) {
            $modifiedColumns[':p' . $index++]  = 'status_terminate';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_TERMINATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'terminate_date';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_SUSPEND)) {
            $modifiedColumns[':p' . $index++]  = 'status_suspend';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SUSPEND_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'suspend_date';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_BLACKLIST)) {
            $modifiedColumns[':p' . $index++]  = 'status_blacklist';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_ATO)) {
            $modifiedColumns[':p' . $index++]  = 'status_ato';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SLETTER)) {
            $modifiedColumns[':p' . $index++]  = 'sletter';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SINV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sinv_code';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_TXTOPTION)) {
            $modifiedColumns[':p' . $index++]  = 'txtoption';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MCODE_REF)) {
            $modifiedColumns[':p' . $index++]  = 'mcode_ref';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SBOOK)) {
            $modifiedColumns[':p' . $index++]  = 'sbook';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SBINV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sbinv_code';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CID_MOBILE)) {
            $modifiedColumns[':p' . $index++]  = 'cid_mobile';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BEWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'bewallet';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BVOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'bvoucher';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_VOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'voucher';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MANAGER)) {
            $modifiedColumns[':p' . $index++]  = 'manager';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'mtype';
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UIDBASE)) {
            $modifiedColumns[':p' . $index++]  = 'uidbase';
        }

        $sql = sprintf(
            'INSERT INTO ali_member_tmp (%s) VALUES (%s)',
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
                    case 'transtype':
                        $stmt->bindValue($identifier, $this->transtype, PDO::PARAM_INT);
                        break;
                    case 'paytype':
                        $stmt->bindValue($identifier, $this->paytype, PDO::PARAM_INT);
                        break;
                    case 'paydate':
                        $stmt->bindValue($identifier, $this->paydate ? $this->paydate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'credittype':
                        $stmt->bindValue($identifier, $this->credittype, PDO::PARAM_INT);
                        break;
                    case 'sendtype':
                        $stmt->bindValue($identifier, $this->sendtype, PDO::PARAM_INT);
                        break;
                    case 'cstreet':
                        $stmt->bindValue($identifier, $this->cstreet, PDO::PARAM_STR);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'name_f':
                        $stmt->bindValue($identifier, $this->name_f, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'name_e':
                        $stmt->bindValue($identifier, $this->name_e, PDO::PARAM_STR);
                        break;
                    case 'posid':
                        $stmt->bindValue($identifier, $this->posid, PDO::PARAM_STR);
                        break;
                    case 'mdate':
                        $stmt->bindValue($identifier, $this->mdate, PDO::PARAM_STR);
                        break;
                    case 'birthday':
                        $stmt->bindValue($identifier, $this->birthday, PDO::PARAM_STR);
                        break;
                    case 'national':
                        $stmt->bindValue($identifier, $this->national, PDO::PARAM_STR);
                        break;
                    case 'id_tax':
                        $stmt->bindValue($identifier, $this->id_tax, PDO::PARAM_STR);
                        break;
                    case 'id_card':
                        $stmt->bindValue($identifier, $this->id_card, PDO::PARAM_STR);
                        break;
                    case 'zip':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case 'home_t':
                        $stmt->bindValue($identifier, $this->home_t, PDO::PARAM_STR);
                        break;
                    case 'office_t':
                        $stmt->bindValue($identifier, $this->office_t, PDO::PARAM_STR);
                        break;
                    case 'mobile':
                        $stmt->bindValue($identifier, $this->mobile, PDO::PARAM_STR);
                        break;
                    case 'mcode_acc':
                        $stmt->bindValue($identifier, $this->mcode_acc, PDO::PARAM_STR);
                        break;
                    case 'bonusrec':
                        $stmt->bindValue($identifier, $this->bonusrec, PDO::PARAM_STR);
                        break;
                    case 'bankcode':
                        $stmt->bindValue($identifier, $this->bankcode, PDO::PARAM_STR);
                        break;
                    case 'branch':
                        $stmt->bindValue($identifier, $this->branch, PDO::PARAM_STR);
                        break;
                    case 'acc_type':
                        $stmt->bindValue($identifier, $this->acc_type, PDO::PARAM_STR);
                        break;
                    case 'acc_no':
                        $stmt->bindValue($identifier, $this->acc_no, PDO::PARAM_STR);
                        break;
                    case 'acc_name':
                        $stmt->bindValue($identifier, $this->acc_name, PDO::PARAM_STR);
                        break;
                    case 'acc_prov':
                        $stmt->bindValue($identifier, $this->acc_prov, PDO::PARAM_STR);
                        break;
                    case 'sv_code':
                        $stmt->bindValue($identifier, $this->sv_code, PDO::PARAM_STR);
                        break;
                    case 'sp_code':
                        $stmt->bindValue($identifier, $this->sp_code, PDO::PARAM_STR);
                        break;
                    case 'sp_name':
                        $stmt->bindValue($identifier, $this->sp_name, PDO::PARAM_STR);
                        break;
                    case 'upa_code':
                        $stmt->bindValue($identifier, $this->upa_code, PDO::PARAM_STR);
                        break;
                    case 'upa_name':
                        $stmt->bindValue($identifier, $this->upa_name, PDO::PARAM_STR);
                        break;
                    case 'lr':
                        $stmt->bindValue($identifier, $this->lr, PDO::PARAM_INT);
                        break;
                    case 'complete':
                        $stmt->bindValue($identifier, $this->complete, PDO::PARAM_STR);
                        break;
                    case 'compdate':
                        $stmt->bindValue($identifier, $this->compdate, PDO::PARAM_STR);
                        break;
                    case 'modate':
                        $stmt->bindValue($identifier, $this->modate, PDO::PARAM_STR);
                        break;
                    case 'usercode':
                        $stmt->bindValue($identifier, $this->usercode, PDO::PARAM_STR);
                        break;
                    case 'name_b':
                        $stmt->bindValue($identifier, $this->name_b, PDO::PARAM_STR);
                        break;
                    case 'sex':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_STR);
                        break;
                    case 'age':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_INT);
                        break;
                    case 'occupation':
                        $stmt->bindValue($identifier, $this->occupation, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case 'mar_name':
                        $stmt->bindValue($identifier, $this->mar_name, PDO::PARAM_STR);
                        break;
                    case 'mar_age':
                        $stmt->bindValue($identifier, $this->mar_age, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'beneficiaries':
                        $stmt->bindValue($identifier, $this->beneficiaries, PDO::PARAM_STR);
                        break;
                    case 'relation':
                        $stmt->bindValue($identifier, $this->relation, PDO::PARAM_STR);
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
                    case 'fax':
                        $stmt->bindValue($identifier, $this->fax, PDO::PARAM_STR);
                        break;
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'pos_cur':
                        $stmt->bindValue($identifier, $this->pos_cur, PDO::PARAM_STR);
                        break;
                    case 'pos_cur1':
                        $stmt->bindValue($identifier, $this->pos_cur1, PDO::PARAM_STR);
                        break;
                    case 'pos_cur2':
                        $stmt->bindValue($identifier, $this->pos_cur2, PDO::PARAM_STR);
                        break;
                    case 'pos_cur3':
                        $stmt->bindValue($identifier, $this->pos_cur3, PDO::PARAM_STR);
                        break;
                    case 'pos_cur4':
                        $stmt->bindValue($identifier, $this->pos_cur4, PDO::PARAM_STR);
                        break;
                    case 'rpos_cur4':
                        $stmt->bindValue($identifier, $this->rpos_cur4, PDO::PARAM_INT);
                        break;
                    case 'memdesc':
                        $stmt->bindValue($identifier, $this->memdesc, PDO::PARAM_STR);
                        break;
                    case 'cmp':
                        $stmt->bindValue($identifier, $this->cmp, PDO::PARAM_STR);
                        break;
                    case 'cmp2':
                        $stmt->bindValue($identifier, $this->cmp2, PDO::PARAM_STR);
                        break;
                    case 'cmp3':
                        $stmt->bindValue($identifier, $this->cmp3, PDO::PARAM_STR);
                        break;
                    case 'ccmp':
                        $stmt->bindValue($identifier, $this->ccmp, PDO::PARAM_STR);
                        break;
                    case 'ccmp2':
                        $stmt->bindValue($identifier, $this->ccmp2, PDO::PARAM_STR);
                        break;
                    case 'ccmp3':
                        $stmt->bindValue($identifier, $this->ccmp3, PDO::PARAM_STR);
                        break;
                    case 'address':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'street':
                        $stmt->bindValue($identifier, $this->street, PDO::PARAM_STR);
                        break;
                    case 'building':
                        $stmt->bindValue($identifier, $this->building, PDO::PARAM_STR);
                        break;
                    case 'village':
                        $stmt->bindValue($identifier, $this->village, PDO::PARAM_STR);
                        break;
                    case 'soi':
                        $stmt->bindValue($identifier, $this->soi, PDO::PARAM_STR);
                        break;
                    case 'ewallet':
                        $stmt->bindValue($identifier, $this->ewallet, PDO::PARAM_STR);
                        break;
                    case 'bmdate1':
                        $stmt->bindValue($identifier, $this->bmdate1, PDO::PARAM_STR);
                        break;
                    case 'bmdate2':
                        $stmt->bindValue($identifier, $this->bmdate2, PDO::PARAM_STR);
                        break;
                    case 'bmdate3':
                        $stmt->bindValue($identifier, $this->bmdate3, PDO::PARAM_STR);
                        break;
                    case 'cbmdate1':
                        $stmt->bindValue($identifier, $this->cbmdate1, PDO::PARAM_STR);
                        break;
                    case 'cbmdate2':
                        $stmt->bindValue($identifier, $this->cbmdate2, PDO::PARAM_STR);
                        break;
                    case 'cbmdate3':
                        $stmt->bindValue($identifier, $this->cbmdate3, PDO::PARAM_STR);
                        break;
                    case 'online':
                        $stmt->bindValue($identifier, $this->online, PDO::PARAM_INT);
                        break;
                    case 'cname_f':
                        $stmt->bindValue($identifier, $this->cname_f, PDO::PARAM_STR);
                        break;
                    case 'cname_t':
                        $stmt->bindValue($identifier, $this->cname_t, PDO::PARAM_STR);
                        break;
                    case 'cname_e':
                        $stmt->bindValue($identifier, $this->cname_e, PDO::PARAM_STR);
                        break;
                    case 'cname_b':
                        $stmt->bindValue($identifier, $this->cname_b, PDO::PARAM_STR);
                        break;
                    case 'cbirthday':
                        $stmt->bindValue($identifier, $this->cbirthday, PDO::PARAM_STR);
                        break;
                    case 'cnational':
                        $stmt->bindValue($identifier, $this->cnational, PDO::PARAM_STR);
                        break;
                    case 'cid_tax':
                        $stmt->bindValue($identifier, $this->cid_tax, PDO::PARAM_STR);
                        break;
                    case 'cid_card':
                        $stmt->bindValue($identifier, $this->cid_card, PDO::PARAM_STR);
                        break;
                    case 'caddress':
                        $stmt->bindValue($identifier, $this->caddress, PDO::PARAM_STR);
                        break;
                    case 'cbuilding':
                        $stmt->bindValue($identifier, $this->cbuilding, PDO::PARAM_STR);
                        break;
                    case 'cvillage':
                        $stmt->bindValue($identifier, $this->cvillage, PDO::PARAM_STR);
                        break;
                    case 'csoi':
                        $stmt->bindValue($identifier, $this->csoi, PDO::PARAM_STR);
                        break;
                    case 'czip':
                        $stmt->bindValue($identifier, $this->czip, PDO::PARAM_STR);
                        break;
                    case 'chome_t':
                        $stmt->bindValue($identifier, $this->chome_t, PDO::PARAM_STR);
                        break;
                    case 'coffice_t':
                        $stmt->bindValue($identifier, $this->coffice_t, PDO::PARAM_STR);
                        break;
                    case 'cmobile':
                        $stmt->bindValue($identifier, $this->cmobile, PDO::PARAM_STR);
                        break;
                    case 'cfax':
                        $stmt->bindValue($identifier, $this->cfax, PDO::PARAM_STR);
                        break;
                    case 'csex':
                        $stmt->bindValue($identifier, $this->csex, PDO::PARAM_STR);
                        break;
                    case 'cemail':
                        $stmt->bindValue($identifier, $this->cemail, PDO::PARAM_STR);
                        break;
                    case 'cdistrictId':
                        $stmt->bindValue($identifier, $this->cdistrictid, PDO::PARAM_INT);
                        break;
                    case 'camphurId':
                        $stmt->bindValue($identifier, $this->camphurid, PDO::PARAM_INT);
                        break;
                    case 'cprovinceId':
                        $stmt->bindValue($identifier, $this->cprovinceid, PDO::PARAM_INT);
                        break;
                    case 'iname_f':
                        $stmt->bindValue($identifier, $this->iname_f, PDO::PARAM_STR);
                        break;
                    case 'iname_t':
                        $stmt->bindValue($identifier, $this->iname_t, PDO::PARAM_STR);
                        break;
                    case 'irelation':
                        $stmt->bindValue($identifier, $this->irelation, PDO::PARAM_STR);
                        break;
                    case 'iphone':
                        $stmt->bindValue($identifier, $this->iphone, PDO::PARAM_STR);
                        break;
                    case 'iid_card':
                        $stmt->bindValue($identifier, $this->iid_card, PDO::PARAM_STR);
                        break;
                    case 'status_doc':
                        $stmt->bindValue($identifier, $this->status_doc, PDO::PARAM_INT);
                        break;
                    case 'status_expire':
                        $stmt->bindValue($identifier, $this->status_expire, PDO::PARAM_INT);
                        break;
                    case 'status_terminate':
                        $stmt->bindValue($identifier, $this->status_terminate, PDO::PARAM_INT);
                        break;
                    case 'terminate_date':
                        $stmt->bindValue($identifier, $this->terminate_date ? $this->terminate_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'status_suspend':
                        $stmt->bindValue($identifier, $this->status_suspend, PDO::PARAM_INT);
                        break;
                    case 'suspend_date':
                        $stmt->bindValue($identifier, $this->suspend_date ? $this->suspend_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'status_blacklist':
                        $stmt->bindValue($identifier, $this->status_blacklist, PDO::PARAM_INT);
                        break;
                    case 'status_ato':
                        $stmt->bindValue($identifier, $this->status_ato, PDO::PARAM_INT);
                        break;
                    case 'sletter':
                        $stmt->bindValue($identifier, $this->sletter, PDO::PARAM_INT);
                        break;
                    case 'sinv_code':
                        $stmt->bindValue($identifier, $this->sinv_code, PDO::PARAM_STR);
                        break;
                    case 'txtoption':
                        $stmt->bindValue($identifier, $this->txtoption, PDO::PARAM_STR);
                        break;
                    case 'mcode_ref':
                        $stmt->bindValue($identifier, $this->mcode_ref, PDO::PARAM_STR);
                        break;
                    case 'cancel':
                        $stmt->bindValue($identifier, $this->cancel, PDO::PARAM_INT);
                        break;
                    case 'sbook':
                        $stmt->bindValue($identifier, $this->sbook, PDO::PARAM_INT);
                        break;
                    case 'sbinv_code':
                        $stmt->bindValue($identifier, $this->sbinv_code, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'cid_mobile':
                        $stmt->bindValue($identifier, $this->cid_mobile, PDO::PARAM_STR);
                        break;
                    case 'bewallet':
                        $stmt->bindValue($identifier, $this->bewallet, PDO::PARAM_STR);
                        break;
                    case 'bvoucher':
                        $stmt->bindValue($identifier, $this->bvoucher, PDO::PARAM_STR);
                        break;
                    case 'voucher':
                        $stmt->bindValue($identifier, $this->voucher, PDO::PARAM_STR);
                        break;
                    case 'manager':
                        $stmt->bindValue($identifier, $this->manager, PDO::PARAM_STR);
                        break;
                    case 'mtype':
                        $stmt->bindValue($identifier, $this->mtype, PDO::PARAM_STR);
                        break;
                    case 'uidbase':
                        $stmt->bindValue($identifier, $this->uidbase, PDO::PARAM_STR);
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
        $pos = AliMemberTmpTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getTranstype();
                break;
            case 2:
                return $this->getPaytype();
                break;
            case 3:
                return $this->getPaydate();
                break;
            case 4:
                return $this->getCredittype();
                break;
            case 5:
                return $this->getSendtype();
                break;
            case 6:
                return $this->getCstreet();
                break;
            case 7:
                return $this->getMcode();
                break;
            case 8:
                return $this->getNameF();
                break;
            case 9:
                return $this->getNameT();
                break;
            case 10:
                return $this->getNameE();
                break;
            case 11:
                return $this->getPosid();
                break;
            case 12:
                return $this->getMdate();
                break;
            case 13:
                return $this->getBirthday();
                break;
            case 14:
                return $this->getNational();
                break;
            case 15:
                return $this->getIdTax();
                break;
            case 16:
                return $this->getIdCard();
                break;
            case 17:
                return $this->getZip();
                break;
            case 18:
                return $this->getHomeT();
                break;
            case 19:
                return $this->getOfficeT();
                break;
            case 20:
                return $this->getMobile();
                break;
            case 21:
                return $this->getMcodeAcc();
                break;
            case 22:
                return $this->getBonusrec();
                break;
            case 23:
                return $this->getBankcode();
                break;
            case 24:
                return $this->getBranch();
                break;
            case 25:
                return $this->getAccType();
                break;
            case 26:
                return $this->getAccNo();
                break;
            case 27:
                return $this->getAccName();
                break;
            case 28:
                return $this->getAccProv();
                break;
            case 29:
                return $this->getSvCode();
                break;
            case 30:
                return $this->getSpCode();
                break;
            case 31:
                return $this->getSpName();
                break;
            case 32:
                return $this->getUpaCode();
                break;
            case 33:
                return $this->getUpaName();
                break;
            case 34:
                return $this->getLr();
                break;
            case 35:
                return $this->getComplete();
                break;
            case 36:
                return $this->getCompdate();
                break;
            case 37:
                return $this->getModate();
                break;
            case 38:
                return $this->getUsercode();
                break;
            case 39:
                return $this->getNameB();
                break;
            case 40:
                return $this->getSex();
                break;
            case 41:
                return $this->getAge();
                break;
            case 42:
                return $this->getOccupation();
                break;
            case 43:
                return $this->getStatus();
                break;
            case 44:
                return $this->getMarName();
                break;
            case 45:
                return $this->getMarAge();
                break;
            case 46:
                return $this->getEmail();
                break;
            case 47:
                return $this->getBeneficiaries();
                break;
            case 48:
                return $this->getRelation();
                break;
            case 49:
                return $this->getDistrictid();
                break;
            case 50:
                return $this->getAmphurid();
                break;
            case 51:
                return $this->getProvinceid();
                break;
            case 52:
                return $this->getFax();
                break;
            case 53:
                return $this->getInvCode();
                break;
            case 54:
                return $this->getUid();
                break;
            case 55:
                return $this->getPosCur();
                break;
            case 56:
                return $this->getPosCur1();
                break;
            case 57:
                return $this->getPosCur2();
                break;
            case 58:
                return $this->getPosCur3();
                break;
            case 59:
                return $this->getPosCur4();
                break;
            case 60:
                return $this->getRposCur4();
                break;
            case 61:
                return $this->getMemdesc();
                break;
            case 62:
                return $this->getCmp();
                break;
            case 63:
                return $this->getCmp2();
                break;
            case 64:
                return $this->getCmp3();
                break;
            case 65:
                return $this->getCcmp();
                break;
            case 66:
                return $this->getCcmp2();
                break;
            case 67:
                return $this->getCcmp3();
                break;
            case 68:
                return $this->getAddress();
                break;
            case 69:
                return $this->getStreet();
                break;
            case 70:
                return $this->getBuilding();
                break;
            case 71:
                return $this->getVillage();
                break;
            case 72:
                return $this->getSoi();
                break;
            case 73:
                return $this->getEwallet();
                break;
            case 74:
                return $this->getBmdate1();
                break;
            case 75:
                return $this->getBmdate2();
                break;
            case 76:
                return $this->getBmdate3();
                break;
            case 77:
                return $this->getCbmdate1();
                break;
            case 78:
                return $this->getCbmdate2();
                break;
            case 79:
                return $this->getCbmdate3();
                break;
            case 80:
                return $this->getOnline();
                break;
            case 81:
                return $this->getCnameF();
                break;
            case 82:
                return $this->getCnameT();
                break;
            case 83:
                return $this->getCnameE();
                break;
            case 84:
                return $this->getCnameB();
                break;
            case 85:
                return $this->getCbirthday();
                break;
            case 86:
                return $this->getCnational();
                break;
            case 87:
                return $this->getCidTax();
                break;
            case 88:
                return $this->getCidCard();
                break;
            case 89:
                return $this->getCaddress();
                break;
            case 90:
                return $this->getCbuilding();
                break;
            case 91:
                return $this->getCvillage();
                break;
            case 92:
                return $this->getCsoi();
                break;
            case 93:
                return $this->getCzip();
                break;
            case 94:
                return $this->getChomeT();
                break;
            case 95:
                return $this->getCofficeT();
                break;
            case 96:
                return $this->getCmobile();
                break;
            case 97:
                return $this->getCfax();
                break;
            case 98:
                return $this->getCsex();
                break;
            case 99:
                return $this->getCemail();
                break;
            case 100:
                return $this->getCdistrictid();
                break;
            case 101:
                return $this->getCamphurid();
                break;
            case 102:
                return $this->getCprovinceid();
                break;
            case 103:
                return $this->getInameF();
                break;
            case 104:
                return $this->getInameT();
                break;
            case 105:
                return $this->getIrelation();
                break;
            case 106:
                return $this->getIphone();
                break;
            case 107:
                return $this->getIidCard();
                break;
            case 108:
                return $this->getStatusDoc();
                break;
            case 109:
                return $this->getStatusExpire();
                break;
            case 110:
                return $this->getStatusTerminate();
                break;
            case 111:
                return $this->getTerminateDate();
                break;
            case 112:
                return $this->getStatusSuspend();
                break;
            case 113:
                return $this->getSuspendDate();
                break;
            case 114:
                return $this->getStatusBlacklist();
                break;
            case 115:
                return $this->getStatusAto();
                break;
            case 116:
                return $this->getSletter();
                break;
            case 117:
                return $this->getSinvCode();
                break;
            case 118:
                return $this->getTxtoption();
                break;
            case 119:
                return $this->getMcodeRef();
                break;
            case 120:
                return $this->getCancel();
                break;
            case 121:
                return $this->getSbook();
                break;
            case 122:
                return $this->getSbinvCode();
                break;
            case 123:
                return $this->getLocationbase();
                break;
            case 124:
                return $this->getCidMobile();
                break;
            case 125:
                return $this->getBewallet();
                break;
            case 126:
                return $this->getBvoucher();
                break;
            case 127:
                return $this->getVoucher();
                break;
            case 128:
                return $this->getManager();
                break;
            case 129:
                return $this->getMtype();
                break;
            case 130:
                return $this->getUidbase();
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

        if (isset($alreadyDumpedObjects['AliMemberTmp'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliMemberTmp'][$this->hashCode()] = true;
        $keys = AliMemberTmpTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTranstype(),
            $keys[2] => $this->getPaytype(),
            $keys[3] => $this->getPaydate(),
            $keys[4] => $this->getCredittype(),
            $keys[5] => $this->getSendtype(),
            $keys[6] => $this->getCstreet(),
            $keys[7] => $this->getMcode(),
            $keys[8] => $this->getNameF(),
            $keys[9] => $this->getNameT(),
            $keys[10] => $this->getNameE(),
            $keys[11] => $this->getPosid(),
            $keys[12] => $this->getMdate(),
            $keys[13] => $this->getBirthday(),
            $keys[14] => $this->getNational(),
            $keys[15] => $this->getIdTax(),
            $keys[16] => $this->getIdCard(),
            $keys[17] => $this->getZip(),
            $keys[18] => $this->getHomeT(),
            $keys[19] => $this->getOfficeT(),
            $keys[20] => $this->getMobile(),
            $keys[21] => $this->getMcodeAcc(),
            $keys[22] => $this->getBonusrec(),
            $keys[23] => $this->getBankcode(),
            $keys[24] => $this->getBranch(),
            $keys[25] => $this->getAccType(),
            $keys[26] => $this->getAccNo(),
            $keys[27] => $this->getAccName(),
            $keys[28] => $this->getAccProv(),
            $keys[29] => $this->getSvCode(),
            $keys[30] => $this->getSpCode(),
            $keys[31] => $this->getSpName(),
            $keys[32] => $this->getUpaCode(),
            $keys[33] => $this->getUpaName(),
            $keys[34] => $this->getLr(),
            $keys[35] => $this->getComplete(),
            $keys[36] => $this->getCompdate(),
            $keys[37] => $this->getModate(),
            $keys[38] => $this->getUsercode(),
            $keys[39] => $this->getNameB(),
            $keys[40] => $this->getSex(),
            $keys[41] => $this->getAge(),
            $keys[42] => $this->getOccupation(),
            $keys[43] => $this->getStatus(),
            $keys[44] => $this->getMarName(),
            $keys[45] => $this->getMarAge(),
            $keys[46] => $this->getEmail(),
            $keys[47] => $this->getBeneficiaries(),
            $keys[48] => $this->getRelation(),
            $keys[49] => $this->getDistrictid(),
            $keys[50] => $this->getAmphurid(),
            $keys[51] => $this->getProvinceid(),
            $keys[52] => $this->getFax(),
            $keys[53] => $this->getInvCode(),
            $keys[54] => $this->getUid(),
            $keys[55] => $this->getPosCur(),
            $keys[56] => $this->getPosCur1(),
            $keys[57] => $this->getPosCur2(),
            $keys[58] => $this->getPosCur3(),
            $keys[59] => $this->getPosCur4(),
            $keys[60] => $this->getRposCur4(),
            $keys[61] => $this->getMemdesc(),
            $keys[62] => $this->getCmp(),
            $keys[63] => $this->getCmp2(),
            $keys[64] => $this->getCmp3(),
            $keys[65] => $this->getCcmp(),
            $keys[66] => $this->getCcmp2(),
            $keys[67] => $this->getCcmp3(),
            $keys[68] => $this->getAddress(),
            $keys[69] => $this->getStreet(),
            $keys[70] => $this->getBuilding(),
            $keys[71] => $this->getVillage(),
            $keys[72] => $this->getSoi(),
            $keys[73] => $this->getEwallet(),
            $keys[74] => $this->getBmdate1(),
            $keys[75] => $this->getBmdate2(),
            $keys[76] => $this->getBmdate3(),
            $keys[77] => $this->getCbmdate1(),
            $keys[78] => $this->getCbmdate2(),
            $keys[79] => $this->getCbmdate3(),
            $keys[80] => $this->getOnline(),
            $keys[81] => $this->getCnameF(),
            $keys[82] => $this->getCnameT(),
            $keys[83] => $this->getCnameE(),
            $keys[84] => $this->getCnameB(),
            $keys[85] => $this->getCbirthday(),
            $keys[86] => $this->getCnational(),
            $keys[87] => $this->getCidTax(),
            $keys[88] => $this->getCidCard(),
            $keys[89] => $this->getCaddress(),
            $keys[90] => $this->getCbuilding(),
            $keys[91] => $this->getCvillage(),
            $keys[92] => $this->getCsoi(),
            $keys[93] => $this->getCzip(),
            $keys[94] => $this->getChomeT(),
            $keys[95] => $this->getCofficeT(),
            $keys[96] => $this->getCmobile(),
            $keys[97] => $this->getCfax(),
            $keys[98] => $this->getCsex(),
            $keys[99] => $this->getCemail(),
            $keys[100] => $this->getCdistrictid(),
            $keys[101] => $this->getCamphurid(),
            $keys[102] => $this->getCprovinceid(),
            $keys[103] => $this->getInameF(),
            $keys[104] => $this->getInameT(),
            $keys[105] => $this->getIrelation(),
            $keys[106] => $this->getIphone(),
            $keys[107] => $this->getIidCard(),
            $keys[108] => $this->getStatusDoc(),
            $keys[109] => $this->getStatusExpire(),
            $keys[110] => $this->getStatusTerminate(),
            $keys[111] => $this->getTerminateDate(),
            $keys[112] => $this->getStatusSuspend(),
            $keys[113] => $this->getSuspendDate(),
            $keys[114] => $this->getStatusBlacklist(),
            $keys[115] => $this->getStatusAto(),
            $keys[116] => $this->getSletter(),
            $keys[117] => $this->getSinvCode(),
            $keys[118] => $this->getTxtoption(),
            $keys[119] => $this->getMcodeRef(),
            $keys[120] => $this->getCancel(),
            $keys[121] => $this->getSbook(),
            $keys[122] => $this->getSbinvCode(),
            $keys[123] => $this->getLocationbase(),
            $keys[124] => $this->getCidMobile(),
            $keys[125] => $this->getBewallet(),
            $keys[126] => $this->getBvoucher(),
            $keys[127] => $this->getVoucher(),
            $keys[128] => $this->getManager(),
            $keys[129] => $this->getMtype(),
            $keys[130] => $this->getUidbase(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[111]] instanceof \DateTimeInterface) {
            $result[$keys[111]] = $result[$keys[111]]->format('c');
        }

        if ($result[$keys[113]] instanceof \DateTimeInterface) {
            $result[$keys[113]] = $result[$keys[113]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliMemberTmp
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliMemberTmpTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliMemberTmp
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setTranstype($value);
                break;
            case 2:
                $this->setPaytype($value);
                break;
            case 3:
                $this->setPaydate($value);
                break;
            case 4:
                $this->setCredittype($value);
                break;
            case 5:
                $this->setSendtype($value);
                break;
            case 6:
                $this->setCstreet($value);
                break;
            case 7:
                $this->setMcode($value);
                break;
            case 8:
                $this->setNameF($value);
                break;
            case 9:
                $this->setNameT($value);
                break;
            case 10:
                $this->setNameE($value);
                break;
            case 11:
                $this->setPosid($value);
                break;
            case 12:
                $this->setMdate($value);
                break;
            case 13:
                $this->setBirthday($value);
                break;
            case 14:
                $this->setNational($value);
                break;
            case 15:
                $this->setIdTax($value);
                break;
            case 16:
                $this->setIdCard($value);
                break;
            case 17:
                $this->setZip($value);
                break;
            case 18:
                $this->setHomeT($value);
                break;
            case 19:
                $this->setOfficeT($value);
                break;
            case 20:
                $this->setMobile($value);
                break;
            case 21:
                $this->setMcodeAcc($value);
                break;
            case 22:
                $this->setBonusrec($value);
                break;
            case 23:
                $this->setBankcode($value);
                break;
            case 24:
                $this->setBranch($value);
                break;
            case 25:
                $this->setAccType($value);
                break;
            case 26:
                $this->setAccNo($value);
                break;
            case 27:
                $this->setAccName($value);
                break;
            case 28:
                $this->setAccProv($value);
                break;
            case 29:
                $this->setSvCode($value);
                break;
            case 30:
                $this->setSpCode($value);
                break;
            case 31:
                $this->setSpName($value);
                break;
            case 32:
                $this->setUpaCode($value);
                break;
            case 33:
                $this->setUpaName($value);
                break;
            case 34:
                $this->setLr($value);
                break;
            case 35:
                $this->setComplete($value);
                break;
            case 36:
                $this->setCompdate($value);
                break;
            case 37:
                $this->setModate($value);
                break;
            case 38:
                $this->setUsercode($value);
                break;
            case 39:
                $this->setNameB($value);
                break;
            case 40:
                $this->setSex($value);
                break;
            case 41:
                $this->setAge($value);
                break;
            case 42:
                $this->setOccupation($value);
                break;
            case 43:
                $this->setStatus($value);
                break;
            case 44:
                $this->setMarName($value);
                break;
            case 45:
                $this->setMarAge($value);
                break;
            case 46:
                $this->setEmail($value);
                break;
            case 47:
                $this->setBeneficiaries($value);
                break;
            case 48:
                $this->setRelation($value);
                break;
            case 49:
                $this->setDistrictid($value);
                break;
            case 50:
                $this->setAmphurid($value);
                break;
            case 51:
                $this->setProvinceid($value);
                break;
            case 52:
                $this->setFax($value);
                break;
            case 53:
                $this->setInvCode($value);
                break;
            case 54:
                $this->setUid($value);
                break;
            case 55:
                $this->setPosCur($value);
                break;
            case 56:
                $this->setPosCur1($value);
                break;
            case 57:
                $this->setPosCur2($value);
                break;
            case 58:
                $this->setPosCur3($value);
                break;
            case 59:
                $this->setPosCur4($value);
                break;
            case 60:
                $this->setRposCur4($value);
                break;
            case 61:
                $this->setMemdesc($value);
                break;
            case 62:
                $this->setCmp($value);
                break;
            case 63:
                $this->setCmp2($value);
                break;
            case 64:
                $this->setCmp3($value);
                break;
            case 65:
                $this->setCcmp($value);
                break;
            case 66:
                $this->setCcmp2($value);
                break;
            case 67:
                $this->setCcmp3($value);
                break;
            case 68:
                $this->setAddress($value);
                break;
            case 69:
                $this->setStreet($value);
                break;
            case 70:
                $this->setBuilding($value);
                break;
            case 71:
                $this->setVillage($value);
                break;
            case 72:
                $this->setSoi($value);
                break;
            case 73:
                $this->setEwallet($value);
                break;
            case 74:
                $this->setBmdate1($value);
                break;
            case 75:
                $this->setBmdate2($value);
                break;
            case 76:
                $this->setBmdate3($value);
                break;
            case 77:
                $this->setCbmdate1($value);
                break;
            case 78:
                $this->setCbmdate2($value);
                break;
            case 79:
                $this->setCbmdate3($value);
                break;
            case 80:
                $this->setOnline($value);
                break;
            case 81:
                $this->setCnameF($value);
                break;
            case 82:
                $this->setCnameT($value);
                break;
            case 83:
                $this->setCnameE($value);
                break;
            case 84:
                $this->setCnameB($value);
                break;
            case 85:
                $this->setCbirthday($value);
                break;
            case 86:
                $this->setCnational($value);
                break;
            case 87:
                $this->setCidTax($value);
                break;
            case 88:
                $this->setCidCard($value);
                break;
            case 89:
                $this->setCaddress($value);
                break;
            case 90:
                $this->setCbuilding($value);
                break;
            case 91:
                $this->setCvillage($value);
                break;
            case 92:
                $this->setCsoi($value);
                break;
            case 93:
                $this->setCzip($value);
                break;
            case 94:
                $this->setChomeT($value);
                break;
            case 95:
                $this->setCofficeT($value);
                break;
            case 96:
                $this->setCmobile($value);
                break;
            case 97:
                $this->setCfax($value);
                break;
            case 98:
                $this->setCsex($value);
                break;
            case 99:
                $this->setCemail($value);
                break;
            case 100:
                $this->setCdistrictid($value);
                break;
            case 101:
                $this->setCamphurid($value);
                break;
            case 102:
                $this->setCprovinceid($value);
                break;
            case 103:
                $this->setInameF($value);
                break;
            case 104:
                $this->setInameT($value);
                break;
            case 105:
                $this->setIrelation($value);
                break;
            case 106:
                $this->setIphone($value);
                break;
            case 107:
                $this->setIidCard($value);
                break;
            case 108:
                $this->setStatusDoc($value);
                break;
            case 109:
                $this->setStatusExpire($value);
                break;
            case 110:
                $this->setStatusTerminate($value);
                break;
            case 111:
                $this->setTerminateDate($value);
                break;
            case 112:
                $this->setStatusSuspend($value);
                break;
            case 113:
                $this->setSuspendDate($value);
                break;
            case 114:
                $this->setStatusBlacklist($value);
                break;
            case 115:
                $this->setStatusAto($value);
                break;
            case 116:
                $this->setSletter($value);
                break;
            case 117:
                $this->setSinvCode($value);
                break;
            case 118:
                $this->setTxtoption($value);
                break;
            case 119:
                $this->setMcodeRef($value);
                break;
            case 120:
                $this->setCancel($value);
                break;
            case 121:
                $this->setSbook($value);
                break;
            case 122:
                $this->setSbinvCode($value);
                break;
            case 123:
                $this->setLocationbase($value);
                break;
            case 124:
                $this->setCidMobile($value);
                break;
            case 125:
                $this->setBewallet($value);
                break;
            case 126:
                $this->setBvoucher($value);
                break;
            case 127:
                $this->setVoucher($value);
                break;
            case 128:
                $this->setManager($value);
                break;
            case 129:
                $this->setMtype($value);
                break;
            case 130:
                $this->setUidbase($value);
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
        $keys = AliMemberTmpTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTranstype($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPaytype($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPaydate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCredittype($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSendtype($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCstreet($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMcode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setNameF($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNameT($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setNameE($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPosid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setMdate($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setBirthday($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setNational($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setIdTax($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIdCard($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setZip($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setHomeT($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setOfficeT($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setMobile($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setMcodeAcc($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setBonusrec($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setBankcode($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setBranch($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setAccType($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setAccNo($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setAccName($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setAccProv($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setSvCode($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setSpCode($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setSpName($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setUpaCode($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setUpaName($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setLr($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setComplete($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setCompdate($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setModate($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setUsercode($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setNameB($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setSex($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setAge($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setOccupation($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setStatus($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setMarName($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setMarAge($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setEmail($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setBeneficiaries($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setRelation($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setDistrictid($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setAmphurid($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setProvinceid($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setFax($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setInvCode($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setUid($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setPosCur($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setPosCur1($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setPosCur2($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setPosCur3($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setPosCur4($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setRposCur4($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setMemdesc($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setCmp($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setCmp2($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setCmp3($arr[$keys[64]]);
        }
        if (array_key_exists($keys[65], $arr)) {
            $this->setCcmp($arr[$keys[65]]);
        }
        if (array_key_exists($keys[66], $arr)) {
            $this->setCcmp2($arr[$keys[66]]);
        }
        if (array_key_exists($keys[67], $arr)) {
            $this->setCcmp3($arr[$keys[67]]);
        }
        if (array_key_exists($keys[68], $arr)) {
            $this->setAddress($arr[$keys[68]]);
        }
        if (array_key_exists($keys[69], $arr)) {
            $this->setStreet($arr[$keys[69]]);
        }
        if (array_key_exists($keys[70], $arr)) {
            $this->setBuilding($arr[$keys[70]]);
        }
        if (array_key_exists($keys[71], $arr)) {
            $this->setVillage($arr[$keys[71]]);
        }
        if (array_key_exists($keys[72], $arr)) {
            $this->setSoi($arr[$keys[72]]);
        }
        if (array_key_exists($keys[73], $arr)) {
            $this->setEwallet($arr[$keys[73]]);
        }
        if (array_key_exists($keys[74], $arr)) {
            $this->setBmdate1($arr[$keys[74]]);
        }
        if (array_key_exists($keys[75], $arr)) {
            $this->setBmdate2($arr[$keys[75]]);
        }
        if (array_key_exists($keys[76], $arr)) {
            $this->setBmdate3($arr[$keys[76]]);
        }
        if (array_key_exists($keys[77], $arr)) {
            $this->setCbmdate1($arr[$keys[77]]);
        }
        if (array_key_exists($keys[78], $arr)) {
            $this->setCbmdate2($arr[$keys[78]]);
        }
        if (array_key_exists($keys[79], $arr)) {
            $this->setCbmdate3($arr[$keys[79]]);
        }
        if (array_key_exists($keys[80], $arr)) {
            $this->setOnline($arr[$keys[80]]);
        }
        if (array_key_exists($keys[81], $arr)) {
            $this->setCnameF($arr[$keys[81]]);
        }
        if (array_key_exists($keys[82], $arr)) {
            $this->setCnameT($arr[$keys[82]]);
        }
        if (array_key_exists($keys[83], $arr)) {
            $this->setCnameE($arr[$keys[83]]);
        }
        if (array_key_exists($keys[84], $arr)) {
            $this->setCnameB($arr[$keys[84]]);
        }
        if (array_key_exists($keys[85], $arr)) {
            $this->setCbirthday($arr[$keys[85]]);
        }
        if (array_key_exists($keys[86], $arr)) {
            $this->setCnational($arr[$keys[86]]);
        }
        if (array_key_exists($keys[87], $arr)) {
            $this->setCidTax($arr[$keys[87]]);
        }
        if (array_key_exists($keys[88], $arr)) {
            $this->setCidCard($arr[$keys[88]]);
        }
        if (array_key_exists($keys[89], $arr)) {
            $this->setCaddress($arr[$keys[89]]);
        }
        if (array_key_exists($keys[90], $arr)) {
            $this->setCbuilding($arr[$keys[90]]);
        }
        if (array_key_exists($keys[91], $arr)) {
            $this->setCvillage($arr[$keys[91]]);
        }
        if (array_key_exists($keys[92], $arr)) {
            $this->setCsoi($arr[$keys[92]]);
        }
        if (array_key_exists($keys[93], $arr)) {
            $this->setCzip($arr[$keys[93]]);
        }
        if (array_key_exists($keys[94], $arr)) {
            $this->setChomeT($arr[$keys[94]]);
        }
        if (array_key_exists($keys[95], $arr)) {
            $this->setCofficeT($arr[$keys[95]]);
        }
        if (array_key_exists($keys[96], $arr)) {
            $this->setCmobile($arr[$keys[96]]);
        }
        if (array_key_exists($keys[97], $arr)) {
            $this->setCfax($arr[$keys[97]]);
        }
        if (array_key_exists($keys[98], $arr)) {
            $this->setCsex($arr[$keys[98]]);
        }
        if (array_key_exists($keys[99], $arr)) {
            $this->setCemail($arr[$keys[99]]);
        }
        if (array_key_exists($keys[100], $arr)) {
            $this->setCdistrictid($arr[$keys[100]]);
        }
        if (array_key_exists($keys[101], $arr)) {
            $this->setCamphurid($arr[$keys[101]]);
        }
        if (array_key_exists($keys[102], $arr)) {
            $this->setCprovinceid($arr[$keys[102]]);
        }
        if (array_key_exists($keys[103], $arr)) {
            $this->setInameF($arr[$keys[103]]);
        }
        if (array_key_exists($keys[104], $arr)) {
            $this->setInameT($arr[$keys[104]]);
        }
        if (array_key_exists($keys[105], $arr)) {
            $this->setIrelation($arr[$keys[105]]);
        }
        if (array_key_exists($keys[106], $arr)) {
            $this->setIphone($arr[$keys[106]]);
        }
        if (array_key_exists($keys[107], $arr)) {
            $this->setIidCard($arr[$keys[107]]);
        }
        if (array_key_exists($keys[108], $arr)) {
            $this->setStatusDoc($arr[$keys[108]]);
        }
        if (array_key_exists($keys[109], $arr)) {
            $this->setStatusExpire($arr[$keys[109]]);
        }
        if (array_key_exists($keys[110], $arr)) {
            $this->setStatusTerminate($arr[$keys[110]]);
        }
        if (array_key_exists($keys[111], $arr)) {
            $this->setTerminateDate($arr[$keys[111]]);
        }
        if (array_key_exists($keys[112], $arr)) {
            $this->setStatusSuspend($arr[$keys[112]]);
        }
        if (array_key_exists($keys[113], $arr)) {
            $this->setSuspendDate($arr[$keys[113]]);
        }
        if (array_key_exists($keys[114], $arr)) {
            $this->setStatusBlacklist($arr[$keys[114]]);
        }
        if (array_key_exists($keys[115], $arr)) {
            $this->setStatusAto($arr[$keys[115]]);
        }
        if (array_key_exists($keys[116], $arr)) {
            $this->setSletter($arr[$keys[116]]);
        }
        if (array_key_exists($keys[117], $arr)) {
            $this->setSinvCode($arr[$keys[117]]);
        }
        if (array_key_exists($keys[118], $arr)) {
            $this->setTxtoption($arr[$keys[118]]);
        }
        if (array_key_exists($keys[119], $arr)) {
            $this->setMcodeRef($arr[$keys[119]]);
        }
        if (array_key_exists($keys[120], $arr)) {
            $this->setCancel($arr[$keys[120]]);
        }
        if (array_key_exists($keys[121], $arr)) {
            $this->setSbook($arr[$keys[121]]);
        }
        if (array_key_exists($keys[122], $arr)) {
            $this->setSbinvCode($arr[$keys[122]]);
        }
        if (array_key_exists($keys[123], $arr)) {
            $this->setLocationbase($arr[$keys[123]]);
        }
        if (array_key_exists($keys[124], $arr)) {
            $this->setCidMobile($arr[$keys[124]]);
        }
        if (array_key_exists($keys[125], $arr)) {
            $this->setBewallet($arr[$keys[125]]);
        }
        if (array_key_exists($keys[126], $arr)) {
            $this->setBvoucher($arr[$keys[126]]);
        }
        if (array_key_exists($keys[127], $arr)) {
            $this->setVoucher($arr[$keys[127]]);
        }
        if (array_key_exists($keys[128], $arr)) {
            $this->setManager($arr[$keys[128]]);
        }
        if (array_key_exists($keys[129], $arr)) {
            $this->setMtype($arr[$keys[129]]);
        }
        if (array_key_exists($keys[130], $arr)) {
            $this->setUidbase($arr[$keys[130]]);
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
     * @return $this|\CciOrm\CciOrm\AliMemberTmp The current object, for fluid interface
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
        $criteria = new Criteria(AliMemberTmpTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ID)) {
            $criteria->add(AliMemberTmpTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_TRANSTYPE)) {
            $criteria->add(AliMemberTmpTableMap::COL_TRANSTYPE, $this->transtype);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_PAYTYPE)) {
            $criteria->add(AliMemberTmpTableMap::COL_PAYTYPE, $this->paytype);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_PAYDATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_PAYDATE, $this->paydate);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CREDITTYPE)) {
            $criteria->add(AliMemberTmpTableMap::COL_CREDITTYPE, $this->credittype);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SENDTYPE)) {
            $criteria->add(AliMemberTmpTableMap::COL_SENDTYPE, $this->sendtype);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CSTREET)) {
            $criteria->add(AliMemberTmpTableMap::COL_CSTREET, $this->cstreet);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MCODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_F)) {
            $criteria->add(AliMemberTmpTableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_E)) {
            $criteria->add(AliMemberTmpTableMap::COL_NAME_E, $this->name_e);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POSID)) {
            $criteria->add(AliMemberTmpTableMap::COL_POSID, $this->posid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MDATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_MDATE, $this->mdate);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BIRTHDAY)) {
            $criteria->add(AliMemberTmpTableMap::COL_BIRTHDAY, $this->birthday);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NATIONAL)) {
            $criteria->add(AliMemberTmpTableMap::COL_NATIONAL, $this->national);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ID_TAX)) {
            $criteria->add(AliMemberTmpTableMap::COL_ID_TAX, $this->id_tax);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ID_CARD)) {
            $criteria->add(AliMemberTmpTableMap::COL_ID_CARD, $this->id_card);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ZIP)) {
            $criteria->add(AliMemberTmpTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_HOME_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_HOME_T, $this->home_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_OFFICE_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_OFFICE_T, $this->office_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MOBILE)) {
            $criteria->add(AliMemberTmpTableMap::COL_MOBILE, $this->mobile);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MCODE_ACC)) {
            $criteria->add(AliMemberTmpTableMap::COL_MCODE_ACC, $this->mcode_acc);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BONUSREC)) {
            $criteria->add(AliMemberTmpTableMap::COL_BONUSREC, $this->bonusrec);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BANKCODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_BANKCODE, $this->bankcode);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BRANCH)) {
            $criteria->add(AliMemberTmpTableMap::COL_BRANCH, $this->branch);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_TYPE)) {
            $criteria->add(AliMemberTmpTableMap::COL_ACC_TYPE, $this->acc_type);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_NO)) {
            $criteria->add(AliMemberTmpTableMap::COL_ACC_NO, $this->acc_no);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_NAME)) {
            $criteria->add(AliMemberTmpTableMap::COL_ACC_NAME, $this->acc_name);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ACC_PROV)) {
            $criteria->add(AliMemberTmpTableMap::COL_ACC_PROV, $this->acc_prov);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SV_CODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_SV_CODE, $this->sv_code);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SP_CODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_SP_CODE, $this->sp_code);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SP_NAME)) {
            $criteria->add(AliMemberTmpTableMap::COL_SP_NAME, $this->sp_name);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UPA_CODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_UPA_CODE, $this->upa_code);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UPA_NAME)) {
            $criteria->add(AliMemberTmpTableMap::COL_UPA_NAME, $this->upa_name);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_LR)) {
            $criteria->add(AliMemberTmpTableMap::COL_LR, $this->lr);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_COMPLETE)) {
            $criteria->add(AliMemberTmpTableMap::COL_COMPLETE, $this->complete);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_COMPDATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_COMPDATE, $this->compdate);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MODATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_MODATE, $this->modate);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_USERCODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_USERCODE, $this->usercode);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_NAME_B)) {
            $criteria->add(AliMemberTmpTableMap::COL_NAME_B, $this->name_b);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SEX)) {
            $criteria->add(AliMemberTmpTableMap::COL_SEX, $this->sex);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_AGE)) {
            $criteria->add(AliMemberTmpTableMap::COL_AGE, $this->age);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_OCCUPATION)) {
            $criteria->add(AliMemberTmpTableMap::COL_OCCUPATION, $this->occupation);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MAR_NAME)) {
            $criteria->add(AliMemberTmpTableMap::COL_MAR_NAME, $this->mar_name);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MAR_AGE)) {
            $criteria->add(AliMemberTmpTableMap::COL_MAR_AGE, $this->mar_age);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_EMAIL)) {
            $criteria->add(AliMemberTmpTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BENEFICIARIES)) {
            $criteria->add(AliMemberTmpTableMap::COL_BENEFICIARIES, $this->beneficiaries);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_RELATION)) {
            $criteria->add(AliMemberTmpTableMap::COL_RELATION, $this->relation);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_DISTRICTID)) {
            $criteria->add(AliMemberTmpTableMap::COL_DISTRICTID, $this->districtid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_AMPHURID)) {
            $criteria->add(AliMemberTmpTableMap::COL_AMPHURID, $this->amphurid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_PROVINCEID)) {
            $criteria->add(AliMemberTmpTableMap::COL_PROVINCEID, $this->provinceid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_FAX)) {
            $criteria->add(AliMemberTmpTableMap::COL_FAX, $this->fax);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_INV_CODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UID)) {
            $criteria->add(AliMemberTmpTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR)) {
            $criteria->add(AliMemberTmpTableMap::COL_POS_CUR, $this->pos_cur);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR1)) {
            $criteria->add(AliMemberTmpTableMap::COL_POS_CUR1, $this->pos_cur1);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR2)) {
            $criteria->add(AliMemberTmpTableMap::COL_POS_CUR2, $this->pos_cur2);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR3)) {
            $criteria->add(AliMemberTmpTableMap::COL_POS_CUR3, $this->pos_cur3);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_POS_CUR4)) {
            $criteria->add(AliMemberTmpTableMap::COL_POS_CUR4, $this->pos_cur4);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_RPOS_CUR4)) {
            $criteria->add(AliMemberTmpTableMap::COL_RPOS_CUR4, $this->rpos_cur4);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MEMDESC)) {
            $criteria->add(AliMemberTmpTableMap::COL_MEMDESC, $this->memdesc);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMP)) {
            $criteria->add(AliMemberTmpTableMap::COL_CMP, $this->cmp);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMP2)) {
            $criteria->add(AliMemberTmpTableMap::COL_CMP2, $this->cmp2);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMP3)) {
            $criteria->add(AliMemberTmpTableMap::COL_CMP3, $this->cmp3);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CCMP)) {
            $criteria->add(AliMemberTmpTableMap::COL_CCMP, $this->ccmp);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CCMP2)) {
            $criteria->add(AliMemberTmpTableMap::COL_CCMP2, $this->ccmp2);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CCMP3)) {
            $criteria->add(AliMemberTmpTableMap::COL_CCMP3, $this->ccmp3);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ADDRESS)) {
            $criteria->add(AliMemberTmpTableMap::COL_ADDRESS, $this->address);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STREET)) {
            $criteria->add(AliMemberTmpTableMap::COL_STREET, $this->street);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BUILDING)) {
            $criteria->add(AliMemberTmpTableMap::COL_BUILDING, $this->building);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_VILLAGE)) {
            $criteria->add(AliMemberTmpTableMap::COL_VILLAGE, $this->village);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SOI)) {
            $criteria->add(AliMemberTmpTableMap::COL_SOI, $this->soi);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_EWALLET)) {
            $criteria->add(AliMemberTmpTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BMDATE1)) {
            $criteria->add(AliMemberTmpTableMap::COL_BMDATE1, $this->bmdate1);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BMDATE2)) {
            $criteria->add(AliMemberTmpTableMap::COL_BMDATE2, $this->bmdate2);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BMDATE3)) {
            $criteria->add(AliMemberTmpTableMap::COL_BMDATE3, $this->bmdate3);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBMDATE1)) {
            $criteria->add(AliMemberTmpTableMap::COL_CBMDATE1, $this->cbmdate1);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBMDATE2)) {
            $criteria->add(AliMemberTmpTableMap::COL_CBMDATE2, $this->cbmdate2);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBMDATE3)) {
            $criteria->add(AliMemberTmpTableMap::COL_CBMDATE3, $this->cbmdate3);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_ONLINE)) {
            $criteria->add(AliMemberTmpTableMap::COL_ONLINE, $this->online);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_F)) {
            $criteria->add(AliMemberTmpTableMap::COL_CNAME_F, $this->cname_f);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_CNAME_T, $this->cname_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_E)) {
            $criteria->add(AliMemberTmpTableMap::COL_CNAME_E, $this->cname_e);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNAME_B)) {
            $criteria->add(AliMemberTmpTableMap::COL_CNAME_B, $this->cname_b);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBIRTHDAY)) {
            $criteria->add(AliMemberTmpTableMap::COL_CBIRTHDAY, $this->cbirthday);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CNATIONAL)) {
            $criteria->add(AliMemberTmpTableMap::COL_CNATIONAL, $this->cnational);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CID_TAX)) {
            $criteria->add(AliMemberTmpTableMap::COL_CID_TAX, $this->cid_tax);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CID_CARD)) {
            $criteria->add(AliMemberTmpTableMap::COL_CID_CARD, $this->cid_card);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CADDRESS)) {
            $criteria->add(AliMemberTmpTableMap::COL_CADDRESS, $this->caddress);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CBUILDING)) {
            $criteria->add(AliMemberTmpTableMap::COL_CBUILDING, $this->cbuilding);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CVILLAGE)) {
            $criteria->add(AliMemberTmpTableMap::COL_CVILLAGE, $this->cvillage);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CSOI)) {
            $criteria->add(AliMemberTmpTableMap::COL_CSOI, $this->csoi);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CZIP)) {
            $criteria->add(AliMemberTmpTableMap::COL_CZIP, $this->czip);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CHOME_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_CHOME_T, $this->chome_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_COFFICE_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_COFFICE_T, $this->coffice_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CMOBILE)) {
            $criteria->add(AliMemberTmpTableMap::COL_CMOBILE, $this->cmobile);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CFAX)) {
            $criteria->add(AliMemberTmpTableMap::COL_CFAX, $this->cfax);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CSEX)) {
            $criteria->add(AliMemberTmpTableMap::COL_CSEX, $this->csex);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CEMAIL)) {
            $criteria->add(AliMemberTmpTableMap::COL_CEMAIL, $this->cemail);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CDISTRICTID)) {
            $criteria->add(AliMemberTmpTableMap::COL_CDISTRICTID, $this->cdistrictid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CAMPHURID)) {
            $criteria->add(AliMemberTmpTableMap::COL_CAMPHURID, $this->camphurid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CPROVINCEID)) {
            $criteria->add(AliMemberTmpTableMap::COL_CPROVINCEID, $this->cprovinceid);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_INAME_F)) {
            $criteria->add(AliMemberTmpTableMap::COL_INAME_F, $this->iname_f);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_INAME_T)) {
            $criteria->add(AliMemberTmpTableMap::COL_INAME_T, $this->iname_t);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_IRELATION)) {
            $criteria->add(AliMemberTmpTableMap::COL_IRELATION, $this->irelation);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_IPHONE)) {
            $criteria->add(AliMemberTmpTableMap::COL_IPHONE, $this->iphone);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_IID_CARD)) {
            $criteria->add(AliMemberTmpTableMap::COL_IID_CARD, $this->iid_card);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_DOC)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS_DOC, $this->status_doc);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_EXPIRE)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS_EXPIRE, $this->status_expire);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_TERMINATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS_TERMINATE, $this->status_terminate);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_TERMINATE_DATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_TERMINATE_DATE, $this->terminate_date);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_SUSPEND)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS_SUSPEND, $this->status_suspend);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SUSPEND_DATE)) {
            $criteria->add(AliMemberTmpTableMap::COL_SUSPEND_DATE, $this->suspend_date);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_BLACKLIST)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS_BLACKLIST, $this->status_blacklist);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_STATUS_ATO)) {
            $criteria->add(AliMemberTmpTableMap::COL_STATUS_ATO, $this->status_ato);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SLETTER)) {
            $criteria->add(AliMemberTmpTableMap::COL_SLETTER, $this->sletter);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SINV_CODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_SINV_CODE, $this->sinv_code);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_TXTOPTION)) {
            $criteria->add(AliMemberTmpTableMap::COL_TXTOPTION, $this->txtoption);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MCODE_REF)) {
            $criteria->add(AliMemberTmpTableMap::COL_MCODE_REF, $this->mcode_ref);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CANCEL)) {
            $criteria->add(AliMemberTmpTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SBOOK)) {
            $criteria->add(AliMemberTmpTableMap::COL_SBOOK, $this->sbook);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_SBINV_CODE)) {
            $criteria->add(AliMemberTmpTableMap::COL_SBINV_CODE, $this->sbinv_code);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliMemberTmpTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_CID_MOBILE)) {
            $criteria->add(AliMemberTmpTableMap::COL_CID_MOBILE, $this->cid_mobile);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BEWALLET)) {
            $criteria->add(AliMemberTmpTableMap::COL_BEWALLET, $this->bewallet);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_BVOUCHER)) {
            $criteria->add(AliMemberTmpTableMap::COL_BVOUCHER, $this->bvoucher);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_VOUCHER)) {
            $criteria->add(AliMemberTmpTableMap::COL_VOUCHER, $this->voucher);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MANAGER)) {
            $criteria->add(AliMemberTmpTableMap::COL_MANAGER, $this->manager);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_MTYPE)) {
            $criteria->add(AliMemberTmpTableMap::COL_MTYPE, $this->mtype);
        }
        if ($this->isColumnModified(AliMemberTmpTableMap::COL_UIDBASE)) {
            $criteria->add(AliMemberTmpTableMap::COL_UIDBASE, $this->uidbase);
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
        $criteria = ChildAliMemberTmpQuery::create();
        $criteria->add(AliMemberTmpTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliMemberTmp (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTranstype($this->getTranstype());
        $copyObj->setPaytype($this->getPaytype());
        $copyObj->setPaydate($this->getPaydate());
        $copyObj->setCredittype($this->getCredittype());
        $copyObj->setSendtype($this->getSendtype());
        $copyObj->setCstreet($this->getCstreet());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setNameE($this->getNameE());
        $copyObj->setPosid($this->getPosid());
        $copyObj->setMdate($this->getMdate());
        $copyObj->setBirthday($this->getBirthday());
        $copyObj->setNational($this->getNational());
        $copyObj->setIdTax($this->getIdTax());
        $copyObj->setIdCard($this->getIdCard());
        $copyObj->setZip($this->getZip());
        $copyObj->setHomeT($this->getHomeT());
        $copyObj->setOfficeT($this->getOfficeT());
        $copyObj->setMobile($this->getMobile());
        $copyObj->setMcodeAcc($this->getMcodeAcc());
        $copyObj->setBonusrec($this->getBonusrec());
        $copyObj->setBankcode($this->getBankcode());
        $copyObj->setBranch($this->getBranch());
        $copyObj->setAccType($this->getAccType());
        $copyObj->setAccNo($this->getAccNo());
        $copyObj->setAccName($this->getAccName());
        $copyObj->setAccProv($this->getAccProv());
        $copyObj->setSvCode($this->getSvCode());
        $copyObj->setSpCode($this->getSpCode());
        $copyObj->setSpName($this->getSpName());
        $copyObj->setUpaCode($this->getUpaCode());
        $copyObj->setUpaName($this->getUpaName());
        $copyObj->setLr($this->getLr());
        $copyObj->setComplete($this->getComplete());
        $copyObj->setCompdate($this->getCompdate());
        $copyObj->setModate($this->getModate());
        $copyObj->setUsercode($this->getUsercode());
        $copyObj->setNameB($this->getNameB());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setOccupation($this->getOccupation());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setMarName($this->getMarName());
        $copyObj->setMarAge($this->getMarAge());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setBeneficiaries($this->getBeneficiaries());
        $copyObj->setRelation($this->getRelation());
        $copyObj->setDistrictid($this->getDistrictid());
        $copyObj->setAmphurid($this->getAmphurid());
        $copyObj->setProvinceid($this->getProvinceid());
        $copyObj->setFax($this->getFax());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setUid($this->getUid());
        $copyObj->setPosCur($this->getPosCur());
        $copyObj->setPosCur1($this->getPosCur1());
        $copyObj->setPosCur2($this->getPosCur2());
        $copyObj->setPosCur3($this->getPosCur3());
        $copyObj->setPosCur4($this->getPosCur4());
        $copyObj->setRposCur4($this->getRposCur4());
        $copyObj->setMemdesc($this->getMemdesc());
        $copyObj->setCmp($this->getCmp());
        $copyObj->setCmp2($this->getCmp2());
        $copyObj->setCmp3($this->getCmp3());
        $copyObj->setCcmp($this->getCcmp());
        $copyObj->setCcmp2($this->getCcmp2());
        $copyObj->setCcmp3($this->getCcmp3());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setStreet($this->getStreet());
        $copyObj->setBuilding($this->getBuilding());
        $copyObj->setVillage($this->getVillage());
        $copyObj->setSoi($this->getSoi());
        $copyObj->setEwallet($this->getEwallet());
        $copyObj->setBmdate1($this->getBmdate1());
        $copyObj->setBmdate2($this->getBmdate2());
        $copyObj->setBmdate3($this->getBmdate3());
        $copyObj->setCbmdate1($this->getCbmdate1());
        $copyObj->setCbmdate2($this->getCbmdate2());
        $copyObj->setCbmdate3($this->getCbmdate3());
        $copyObj->setOnline($this->getOnline());
        $copyObj->setCnameF($this->getCnameF());
        $copyObj->setCnameT($this->getCnameT());
        $copyObj->setCnameE($this->getCnameE());
        $copyObj->setCnameB($this->getCnameB());
        $copyObj->setCbirthday($this->getCbirthday());
        $copyObj->setCnational($this->getCnational());
        $copyObj->setCidTax($this->getCidTax());
        $copyObj->setCidCard($this->getCidCard());
        $copyObj->setCaddress($this->getCaddress());
        $copyObj->setCbuilding($this->getCbuilding());
        $copyObj->setCvillage($this->getCvillage());
        $copyObj->setCsoi($this->getCsoi());
        $copyObj->setCzip($this->getCzip());
        $copyObj->setChomeT($this->getChomeT());
        $copyObj->setCofficeT($this->getCofficeT());
        $copyObj->setCmobile($this->getCmobile());
        $copyObj->setCfax($this->getCfax());
        $copyObj->setCsex($this->getCsex());
        $copyObj->setCemail($this->getCemail());
        $copyObj->setCdistrictid($this->getCdistrictid());
        $copyObj->setCamphurid($this->getCamphurid());
        $copyObj->setCprovinceid($this->getCprovinceid());
        $copyObj->setInameF($this->getInameF());
        $copyObj->setInameT($this->getInameT());
        $copyObj->setIrelation($this->getIrelation());
        $copyObj->setIphone($this->getIphone());
        $copyObj->setIidCard($this->getIidCard());
        $copyObj->setStatusDoc($this->getStatusDoc());
        $copyObj->setStatusExpire($this->getStatusExpire());
        $copyObj->setStatusTerminate($this->getStatusTerminate());
        $copyObj->setTerminateDate($this->getTerminateDate());
        $copyObj->setStatusSuspend($this->getStatusSuspend());
        $copyObj->setSuspendDate($this->getSuspendDate());
        $copyObj->setStatusBlacklist($this->getStatusBlacklist());
        $copyObj->setStatusAto($this->getStatusAto());
        $copyObj->setSletter($this->getSletter());
        $copyObj->setSinvCode($this->getSinvCode());
        $copyObj->setTxtoption($this->getTxtoption());
        $copyObj->setMcodeRef($this->getMcodeRef());
        $copyObj->setCancel($this->getCancel());
        $copyObj->setSbook($this->getSbook());
        $copyObj->setSbinvCode($this->getSbinvCode());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setCidMobile($this->getCidMobile());
        $copyObj->setBewallet($this->getBewallet());
        $copyObj->setBvoucher($this->getBvoucher());
        $copyObj->setVoucher($this->getVoucher());
        $copyObj->setManager($this->getManager());
        $copyObj->setMtype($this->getMtype());
        $copyObj->setUidbase($this->getUidbase());
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
     * @return \CciOrm\CciOrm\AliMemberTmp Clone of current object.
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
        $this->transtype = null;
        $this->paytype = null;
        $this->paydate = null;
        $this->credittype = null;
        $this->sendtype = null;
        $this->cstreet = null;
        $this->mcode = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->name_e = null;
        $this->posid = null;
        $this->mdate = null;
        $this->birthday = null;
        $this->national = null;
        $this->id_tax = null;
        $this->id_card = null;
        $this->zip = null;
        $this->home_t = null;
        $this->office_t = null;
        $this->mobile = null;
        $this->mcode_acc = null;
        $this->bonusrec = null;
        $this->bankcode = null;
        $this->branch = null;
        $this->acc_type = null;
        $this->acc_no = null;
        $this->acc_name = null;
        $this->acc_prov = null;
        $this->sv_code = null;
        $this->sp_code = null;
        $this->sp_name = null;
        $this->upa_code = null;
        $this->upa_name = null;
        $this->lr = null;
        $this->complete = null;
        $this->compdate = null;
        $this->modate = null;
        $this->usercode = null;
        $this->name_b = null;
        $this->sex = null;
        $this->age = null;
        $this->occupation = null;
        $this->status = null;
        $this->mar_name = null;
        $this->mar_age = null;
        $this->email = null;
        $this->beneficiaries = null;
        $this->relation = null;
        $this->districtid = null;
        $this->amphurid = null;
        $this->provinceid = null;
        $this->fax = null;
        $this->inv_code = null;
        $this->uid = null;
        $this->pos_cur = null;
        $this->pos_cur1 = null;
        $this->pos_cur2 = null;
        $this->pos_cur3 = null;
        $this->pos_cur4 = null;
        $this->rpos_cur4 = null;
        $this->memdesc = null;
        $this->cmp = null;
        $this->cmp2 = null;
        $this->cmp3 = null;
        $this->ccmp = null;
        $this->ccmp2 = null;
        $this->ccmp3 = null;
        $this->address = null;
        $this->street = null;
        $this->building = null;
        $this->village = null;
        $this->soi = null;
        $this->ewallet = null;
        $this->bmdate1 = null;
        $this->bmdate2 = null;
        $this->bmdate3 = null;
        $this->cbmdate1 = null;
        $this->cbmdate2 = null;
        $this->cbmdate3 = null;
        $this->online = null;
        $this->cname_f = null;
        $this->cname_t = null;
        $this->cname_e = null;
        $this->cname_b = null;
        $this->cbirthday = null;
        $this->cnational = null;
        $this->cid_tax = null;
        $this->cid_card = null;
        $this->caddress = null;
        $this->cbuilding = null;
        $this->cvillage = null;
        $this->csoi = null;
        $this->czip = null;
        $this->chome_t = null;
        $this->coffice_t = null;
        $this->cmobile = null;
        $this->cfax = null;
        $this->csex = null;
        $this->cemail = null;
        $this->cdistrictid = null;
        $this->camphurid = null;
        $this->cprovinceid = null;
        $this->iname_f = null;
        $this->iname_t = null;
        $this->irelation = null;
        $this->iphone = null;
        $this->iid_card = null;
        $this->status_doc = null;
        $this->status_expire = null;
        $this->status_terminate = null;
        $this->terminate_date = null;
        $this->status_suspend = null;
        $this->suspend_date = null;
        $this->status_blacklist = null;
        $this->status_ato = null;
        $this->sletter = null;
        $this->sinv_code = null;
        $this->txtoption = null;
        $this->mcode_ref = null;
        $this->cancel = null;
        $this->sbook = null;
        $this->sbinv_code = null;
        $this->locationbase = null;
        $this->cid_mobile = null;
        $this->bewallet = null;
        $this->bvoucher = null;
        $this->voucher = null;
        $this->manager = null;
        $this->mtype = null;
        $this->uidbase = null;
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
        return (string) $this->exportTo(AliMemberTmpTableMap::DEFAULT_STRING_FORMAT);
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
