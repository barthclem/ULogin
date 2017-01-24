<?php
namespace login\Controllers;
use login\Auth\AuthException;
use login\Forms\EditForm;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use login\Controllers\ControllerBase;
use login\Models\User;


class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;

        $numberPage = 1;
        if ($this->request->isPost()) {
           // $query = Criteria::fromInput($this->di, 'User', $_POST);
            //$this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $user = User::find($parameters);
        if (count($user) == 0) {
            $this->flash->notice("The search did not find any user");

            $this->dispatcher->forward([
                "controller" => "user",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $user,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a user
     *
     * @param string $id
     */
    public function editAction($id)
    {
        $form = new EditForm();

        if(!isset($id)){
            $id = $this->request->getPost("id");
        }

        if (!$this->request->isPost()) {

            $user = User::findFirstByid($id);
            if (!$user) {
                $this->flash->error("user was not found");

                $this->dispatcher->forward([
                    'controller' => "user",
                    'action' => 'index'
                ]);

                return;
            }

            $form = new EditForm($user);
        }
        else{
            try{
            if ($form->isValid($this->request->getPost()) != false) {

                //$id = $this->request->getPost("id");
                $user = User::findFirstByid($id);
                $user->name = $this->request->getPost("name");
                $user->username = $this->request->getPost("username");
                $user->email = $this->request->getPost("email");


                if ($user->save()) {
                    $this->flash->success("user was updated successfully");

                    $this->dispatcher->forward([
                        'controller' => "user",
                        'action' => 'index'
                    ]);
                    return;
                }
            }
            $this->flash->error("You have entered invalid parameters");
        }
    catch(AuthException $e){
        $this->flash->error($e->getMessage());
    }
        }

        $this->view->form = $form;
    }


    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {
        $form = new EditForm();
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }
         try {
             if ($form->isValid($this->request->getPost()) != false) {

                 $id = $this->request->getPost("id");
                 $user = User::findFirstByid($id);
                 $user->name = $this->request->getPost("name");
                 $user->username = $this->request->getPost("username");
                 $user->email = $this->request->getPost("email");


                 if ($user->save()) {
                     $this->flash->success("user was updated successfully");

                     $this->dispatcher->forward([
                         'controller' => "user",
                         'action' => 'index'
                     ]);
                     return;
                 }
             }
             $this->flash->error("You have entered invalid parameters");
         }
         catch(AuthException $e){
            $this->flash->error($e->getMessage());
         }

        $this->view->form = $form;

//        $this->dispatcher->forward([
//            'controller' => "user",
//            'action' => 'edit',
//            'params' => [$user->id]
//        ]);
//
//        return;
    }

    /**
     * Deletes a user
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $user = User::findFirstByid($id);
        if (!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "user",
            'action' => "index"
        ]);
    }

}
