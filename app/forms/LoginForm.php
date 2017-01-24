<?php
namespace login\Forms;
/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 18/01/2017
 * Time: 8:36 AM
 */
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Submit;
class LoginForm  extends Form
{

    public function initialize($entity = null ){


        $username = new Text('username',[
            'placeHolder' => 'Username'
        ]);
        $username -> setLabel(' Username ');
        $username -> addValidators([
            new PresenceOf([
                "message" => "field cannot be left empty"
            ])
        ]);

        $this->add($username);

        $email = new Text( 'email');
        $email -> setLabel(' Email');
        $email -> addValidators([
            new PresenceOf([
                "message" => "field cannot be left empty"
            ]),
            new Email([
                "message" => "please enter a valid email address"
            ])
        ]);

        //$this->add($email);



        $password = new Password('password',
            [
                "placeHolder" => "Password"
            ]);
        $password -> setLabel(' Password');
        $password -> addValidators([
           new PresenceOf([
               "message" => "password is required"
           ])
        ]);

        $this->add($password);

        $this->add(new Submit('go', [
            'class' => 'btn btn-success'
        ]));
    }

    /**
     * print error message for  form element
     */
    public function message($name){
       if($this->hasMessagesFor($name)){
           foreach ($this->getMessagesFor($name) as $message)
           {
               $this->flash->error($message);
           }
       }
    }
}