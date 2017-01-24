<?php
namespace login\Models;

class Expenditure extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=30, nullable=true)
     */
    public $type;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    public $totalAmount;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $day;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $recordId;

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
        return 'expenditure';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Expenditure[]|Expenditure
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Expenditure
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
