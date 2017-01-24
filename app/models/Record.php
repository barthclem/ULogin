<?php
namespace login\Models;

class Record extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $name;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    public $totalAmount;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $day;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $userId;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $weekId;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=true)
     */
    public $month;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("login");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'record';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Record[]|Record
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Record
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
