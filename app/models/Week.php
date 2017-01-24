<?php
namespace login\Models;

class Week extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $userID;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $monthId;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $year;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=true)
     */
    public $month;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    public $totalAmount;

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
        return 'week';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Week[]|Week
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Week
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
