<?php
/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 19/01/2017
 * Time: 8:05 PM
 */

namespace login\Forms;


use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Alpha;

class AddExpensesForm extends Form
{

    public function initialize(){

        $expenses = new Text('expenses',["placeHolder" => "Add new Expenses"]);
        $expenses->addValidators([
            new PresenceOf(['message' => ' please enter a text'])
            ,
            new Alpha([
                'message' => 'it is only letters that are allowed here'
            ])
        ]);

        $this->add($expenses);


        $this->add(new Submit('Add New Expenses',[ 'class' => 'btn btn-success']));
    }


    public function message($element){
        if($this->hasMessagesFor($element)){
            foreach ($this->getMessagesFor($element) as $message){
                $this->flash->error($message);
            }

        }
    }

}