<?php

namespace login\Controllers;

use login\Models\Expenses;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize(){

        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateAfter('public');
        $username = $this->displayUserName();
        $this ->view->username = $username;


    }

    public function displayUserName(){
        if($this->auth->getIdentity()){
            $identity = $this->auth->getIdentity();
            //var_dump($identity);
            return $identity['username'];
        }
    }
}


