<?php

namespace login\Models;

class Failedlogins extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $userId;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    public $ipAddress;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $attempted;

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
        return 'failedLogins';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Failedlogins[]|Failedlogins
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Failedlogins
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
