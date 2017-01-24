<?php
namespace login\Auth;

/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 18/01/2017
 * Time: 11:09 AM
 */
use Phalcon\Mvc\User\Component;
use login\Models\User;
use login\Models\RememberTokens;
use login\Models\SuccessLogins;
use login\Models\FailedLogins;
/**
 * This is the Authentication class ... It verifies all inputs ... it is exiting class to write mehn
 */
class Auth extends Component
{

    public function check($credentials){

        //check if user exists
        $user = User::findFirstByUsername($credentials['username']);


        if($user==false){
            $this->registerUserThrottling(0);
            throw new AuthException("Wrong email/password combination");

        }


        //check the password of the user

        if(!$this->security->checkHash($credentials['password'],$user->password)){
            $this->registerUserThrottling($user->id);
            throw new AuthException(" Wrong email/password combination");
        }

        //Register the user's successful login
        $this->saveSuccessfulLogins($user);

        //check if the user chooses the remember me option
        $this->createRememberEnvironment($user);

        if(isset($credentials['remember'])){
            $this->createRememberEnvironment($user);
        }

        //save user in session
        $this->session->set('auth-identity',[
           'id'=> $user->id,
            'name' => $user->username
        ]);

    }

    public function registerWithToken(){

        $userId = $this->cookies->get('RMU');
        $cookieToken = $this->cookies->get('RMT');

        $user = User::findFirstById($userId);

        if($user){
            $useragent = $this->request->getUserAgent();
            $token= md5($user->username.$user->password.$user->$useragent);

            if($token == $cookieToken){
                // get the properties of the token from the database

                $remember = RememberTokens::findFirst(['usersId = ?0 AND token ?1',
                    'bind' =>[
                        $userId,
                        $token
                    ]
                ]);

                if($remember){
                    if(time() - 86400*8 < $remember->createdAt){

                        $this->session->set('auth-identity',[
                            'id' => $user->id,
                            'name' => $user-> username
                        ]);

                        $this->saveSuccessfulLogins($user);

                        return $this->response->redirect('users');

                    }
                }
            }
        }

        $this->cookies->delete('RMU');
        $this->cookies->delete('RMT');

        return $this->response->redirect('session/login');
    }

    /**
     * This class registers successful logins
     * @param $user
     * @throws AuthException
     */
    public function saveSuccessfulLogins($user){
        $successfulLogin = new SuccessLogins();


        $successfulLogin->userId =$user->id;
        $successfulLogin->ipAddress = $this->request->getClientAddress();
        $successfulLogin->userAgent = $this->request->getUserAgent();

        if(!$successfulLogin->save()){
            $message = $successfulLogin->getMessages();
            throw new AuthException($message[0]);
        }
    }


    /**
     * handles fixing the maximum allowable times of failure
     * @param $id
     */
    public function registerUserThrottling($id){


        $failedLogin = new FailedLogins();
        $failedLogin ->usersId = $id;
        $failedLogin ->ipAddress = $this->request->getClientAddress();
        $failedLogin ->attempted = time();


        $attempts = FailedLogins::count([" ipAddress = ?0 AND attempted  >= ?1",
            'bind'=>[
                $this->request->getClientAddress(),
                 time() - 3600 * 6
        ]]);

        switch($attempts){
            case 1:
            case 2:
                break;
            case 3:
            case 4:
                sleep(2);
                break;
            case 5:
                sleep(4);
                break;
        }
    }


    /**
     * @param $user
     */
    public function  createRememberEnvironment($user){

        //create a token
        $userAgent = $this->request->getUserAgent();
        $token= md5($user->username.$user->password.$userAgent);

        $remember = new RememberTokens();
        $remember->userId =$user->id;
        $remember->userAgent =$userAgent;
        $remember->token = $token;
        $remember->createdAt = time();

        if($remember->save() !=false){
            $expire = time() + 86400*8;

            $this->cookies->set('RMU',$user->id,$expire);
            $this->cookies->set('RMT',$token,$expire);


        }



    }

    /**
     * this function deletes the cookies
     */
    public function remove(){

        if($this->cookies->has('RMU')){
            $this->cookies->get('RMU')->delete();

        }

        if($this->cookies->has('RMT')){
            $this->cookies->get('RMT')->delete();
        }

        $this->session->destroy('auth-identity');
    }


    public function hasRememberMe(){
        $this->cookies->has('RMU');
    }
    /**
     * get name of user from cookies
     * @return mixed
     */
    public function getName(){
        $identity = $this->session->get('auth-identity');
        return $identity['name'];
    }

    /**
     * return data stored in a cookie
     * @return \Phalcon\Http\Cookie|\Phalcon\Http\CookieInterface
     */
    public function getIdentity(){
        $identity = $this->session->get('auth-identity');
        return $identity;
    }


    public function authUserById($id){
        $user = User::findFirstById($id);

        if($user == false){
            throw new AuthException(" user does not exist");
        }

        $this->session->set('auth-identity',[
            'id' => $user -> id,
            'name' => $user->username
        ]);
    }


    /**
     * This function gets the user store in cookie
     */
    public function getUser(){
        $identity = $this->getIdentity();

        $id = $identity['id'];
        if(isset($id)){
            $user = User::findFirst($id);
            if($user==false){
                throw new AuthException("user does not exist");
            }
            return $user;
        }
        return false;
    }














}