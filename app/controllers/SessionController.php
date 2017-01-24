<?php

namespace login\Controllers;

use login\Forms\SignUpForm;
use login\Forms\LoginForm;
use login\Models\User;
use login\Auth\AuthException;

class SessionController extends ControllerBase
{


    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

    }

    public function indexAction()
    {

    }

    public function signupAction(){

        //$form = new SignUpForm();

        $form = new SignUpForm();

        try {
            if ($this->request->isPost()) {

                if ($form->isValid($this->request->getPost()) != false) {

                    $user = new User();
                    $user ->name =  $this->request->getPost('name');
                    $user ->username = $this->request->getPost('username');
                    $user ->email = $this->request->getPost('email');
                    $user ->password = $this->security->hash($this->request->getPost('password'));

                    if ($user->save()) {
                        $this->flash->error(" Welcome please login with your credentials ");
                        //destroy old session
                        $this->auth->remove();
                         $this->dispatcher->forward([
                            'controller' => 'session',
                            'action' => 'login'
                        ]);
                         return;

                    }

                }
                $this->flash->error(" User / password combination error ");
            }
        }
        catch(AuthException $e){
            $this->flash->error($e->getMessage());
        }

        $this->view->form = $form;

    }

    public function loginAction(){
         $form = new LoginForm();

         try {
             if (!$this->request->isPost()) {
                 if ($this->auth->hasRememberMe()) {
                     return $this->auth->loginWithRemember();
                 }
             } else {
                 if ($form->isValid($this->request->getPost()) == false) {
                     foreach ($form->getMessages() as $message) {
                         $this->flash->error($message);
                     }
                 } else {

                     $this->auth->check([
                         'username' => $this->request->getPost('username'),
                         'password' => $this->request->getPost('password')
                     ]);



                     return $this->response->redirect('index');
                 }

             }
         }
         catch(AuthException $e){
             $this->flash->error($e->getMessage());
         }



        $this->view->form = $form;
    }

    public function logoutAction(){
         $this->auth->remove();
        return $this->response->redirect('index');
    }

}
