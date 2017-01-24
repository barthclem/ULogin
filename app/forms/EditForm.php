<?php
/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 19/01/2017
 * Time: 1:54 PM
 */

namespace login\Forms;


use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Hidden;
class EditForm extends Form
{

    public function initialize($user=null){


        $name = new Text('name');
        $name->setLabel('Name');
        $name->setDefault($user->name);
        $name->addValidators([
            new PresenceOf([
                'message' => ' name can not be left empty'
            ])
        ]);


        $this->add($name);


        $username = new Text('username');
        $username->setLabel('Username');
        $username->setDefault($user->username);
        $username->addValidators([
            new PresenceOf([
                'message' => ' username cannot be left empty'
            ])
        ]);

        $this->add($username);

        $email = new Text('email');
        $email->setLabel('Email');
        $email->setDefault($user->email);
        $email->addValidators([
            new PresenceOf([
                'message' => ' email must be supplied'
            ]),
            new Email([
                'message' => 'enter a valid email'
            ])
        ]);

        $this->add($email);

        $id = new Hidden('id');
        $id->setDefault($user->id);
        $this->add($id);

        $this->add(new Submit('Save',[
        'class' => 'btn btn-success'
        ]));



    }

    public function message($user){

        if($this->hasMessagesFor($user)) {
            foreach ($this->getMessages($user) as $message) {
                $this->flash->error($message);
            }
        }
    }
}