<?php

namespace login\Forms;

/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 18/01/2017
 * Time: 8:33 AM
 */
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Forms\Element\Submit;

class SignUpForm extends Form
{
    public function initialize(){

        $name = new Text('name',
            [
                "placeHolder" => "Name"
            ]);

        $name->setLabel('name');

        $name->addValidators(
            [
                new PresenceOf([
                    'field' => 'name',
                    'message' => 'Please enter your full name'
                ])
            ]
        );

        //validate email

        $email = new Text('email',
            [
                "placeHolder" => "Email"
            ]);
        $email->setLabel('Email');

        $email -> addValidators([
            new PresenceOf([
                'message' => ' Please ensure you enter your email'
            ]),
            new Email([
                'email'  => ' Please enter a valid email'
            ])
        ]);


        //add email to elements

        $username = new Text('username',
            [
                "placeHolder" => "Username"
            ]);

        $username->setLabel('Username');

        $username->addValidators(
            [
                new PresenceOf([
                    'message' => 'Please enter your full name'
                ])
            ]
        );


        //validate password

        $password = new Password('password',
            [
                "placeHolder" => "Password"
            ]);
        $password->setLabel('Password');
        $password-> addValidators([
            new PresenceOf([
                "message" => " password field cannot be left empty"
            ]),
            new StringLength([
                "min" => 9,
                "message" => "The minimum length of password allowed is 9"
            ])
            ,
            new Confirmation([
                "message" => " Please confirm your password",
                "with" => "confirmPassword"
            ])
        ]);


        $confirmPassword = new Password('confirmPassword',
            [
                "placeHolder" => "Confirm Password"
            ]);
        $confirmPassword->setLabel(' Confirm Password');
        $confirmPassword->addValidators([
            new PresenceOf([
                'message' => ' Confirm field can not be left empty'
            ])
        ]);


        //add  name element to form
        $this->add($name);
        $this->add($username);
        $this->add($email);
        $this->add($password);
        $this->add($confirmPassword);

        $this->add(new Submit('Submit', [
            'class' => 'btn btn-success'
        ]));
    }

    /**
     * print messages for each of the form element
     */
    public function messages($name){
        if($this->hasMessagesFor($name)){
            foreach ($this->getMessagesFor($name) as $message){
                $this->flash->error($message);
            }
        }
    }

}