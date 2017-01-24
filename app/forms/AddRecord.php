<?php
/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 20/01/2017
 * Time: 8:33 AM
 */

namespace login\Forms;


use login\Models\Expenses;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;


class AddRecord extends Form
{

    public function initialize(){

        $userId =$this->midMan->getCurrentUserID();
        $amount = new Text('amount',['placeHolder'=>'# amount']);
        $amount -> addValidators([
            new PresenceOf([
                'message' => 'please fill this field'
            ]),
            new Numericality([
                'message' => 'please only numeric values are allowed'
            ])
        ]);

        $this->add($amount);

        //add the select option
        $query = ['conditions' => 'userId = :userId:',
                  'bind' =>['userId'=>$userId]];
        $select = new Select('expenses',Expenses::find($query),array(
            'useEmpty' => true,
            'emptyText' => 'Choose expense ',
            'using' => array('id', 'title')
        ));

        $this->add($select);


        $this->add(new Submit('Add New Entry',[
            'class' => 'btn btn-success'
        ]));

    }


    public function message($element){
        if($this->hasMessagesFor($element)){
            foreach ($this->message($element) as $message){
                $this->flash->error($message);
            }
        }
    }
}