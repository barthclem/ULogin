<?php

namespace login\Models;
class Expenses extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=40, nullable=false)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $userId;

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
        return 'expenses';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Expenses[]|Expenses
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Expenses
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
