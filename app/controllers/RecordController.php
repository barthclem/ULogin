<?php
namespace login\Controllers;

use login\Auth\AuthException;
use login\Forms\AddRecord;
use login\Models\Expenditure;
use login\Models\Expenses;
use login\Models\Record;
use login\Models\Week;

use Phalcon\Paginator\Adapter\Model as Paginator;



class RecordController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;

        $this->persistent->userId = $this->midMan->getCurrentUserID();
        $userId=  $this->persistent->userId;
        $numberPage = $this->request->getQuery("page", "int");

        //check and create a rcord for the day ...if none exists
        $this->createDailyRecord($userId);

        $record = Record::find(['conditions'=>'userId = :userId:','bind'=>['userId'=>$userId]]);
        if (count($record) == 0) {
            $this->flash->notice("Add a new Record below");

            return;
        }

        $paginator = new Paginator([
            'data' => $record,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    //public function dayrecordAction(){
    public function newAction(){

        $form = new AddRecord();
        //user ID
        $this->view->form = $form;
        $userId = $this->midMan->getCurrentUserID();

        if(!isset($userId)){
            $this->dispatcher->forward([
               'controller'=>'session',
                'action'=>'login'
            ]);
        }

        $expenditures = Expenditure::find([
            'conditions' => 'recordId = :recordId:',
            'bind' =>['recordId' => $this->persistent->recordId]]);//the parameters are the user_id and date added--the current

        if (count($expenditures) == 0) {
            $this->flash->notice("Add your expenses for the day");

            return;
        }

        $this->view->weekIndex = $this->persistent->weekName;
        $this->view->recordName = $this->persistent->recordName;
        $this->view->expenditures = $expenditures;


    }

    public function dateHandler(){

    }

    public function createDailyRecord($userId){
        //get current date
        $date = getdate();
        $this->persistent->day=$weekDayno = $date['wday']; // The index of day in a week
        $monthName = $date['month']; // String of month name
        $monthIndex = $date['mon']; //  Index of month in a year
        $weekDay = $date['weekday'];  //  Day - name
        $year = $date['year'];     // sets year
        $recordTitle = 'Record '.$date['mday'].'-'.$date['mon'].'-'.$date['year'];
        $weekIndex = Week::count([
            'conditions' => 'userID = :userId:',
            'bind' =>['userId' => $userId]
        ]); // this gives the index of the week for a particular user


        //if it's not new check if there's already existing week
        $week = Week::findFirst(['conditions'=>'dayId = :dayId:','bind'=>['dayId'=>$date['mday']]]);


        if(($weekDayno == 0 && $week==false)|| $weekIndex==0){
            //assume the weekday starts with index 0,
            //create a new week

            $week = new Week(['name' => ('week '.($weekIndex+1)),'month'=> $monthName,
                           'userID'=>$userId,'monthId'=>$monthIndex,'year' => $year,'dayId'=>$date['mday']]);
            if($week->save()){
                $weekIndex +=1;
            }

        }

        //if it  is not  a  Sunday

        if ($week == false){
            $weeks = Week::find(['condition'=>'month = :month: AND year = :year:',
                                   'bind'=>['month'=>$monthName,'year'=>$year]]);

            foreach ($weeks as $weekil){
                $week = $weekil;
            }
        }

        //check if the last record in the db has currentDate date
        $record = Record::findFirst(['conditions' => 'name = :name: AND userId = :userId:',
                               'bind'=>['userId'=>$userId,'name'=>$recordTitle]]);

        $recordId = $record->id;

        if(($record)==false){
            $record = new Record();
            $record->name = $recordTitle;
            $record->userId = $userId;
            $record->day = $weekDay;
            $record->weekId = $week->id;
            $record->month = $monthName;
            $record->save();
            $recordId +=1;
        }


        //create a session for this data
        $this->session->set('date-data',[
            'recordTitle' => $recordTitle,
            'weekName'  => 'week '.($weekIndex),
            'weekId'  => $week->id,
            'monthIndex' => $monthIndex,
            'monthName' => $monthName
        ]);

        $this->persistent->weekName = 'week '.($weekIndex);
        $this->persistent->recordId = $recordId;
        $this->persistent->weekIndex = $weekIndex;
        $this->persistent->recordName = $record->name;
    }

    public function viewAction($recordId){
        //get the expenditures for the record id
        $record = Record::findFirstById($recordId);
        $expenditures = Expenditure::find([
            'conditions' => 'recordId = :recordId:',
            'bind' =>['recordId' => $recordId]]);//the parameters are the user_id and date added--the current

        $total =0;

        if (count($expenditures) == 0) {
            $this->flash->notice("Add your expenses for the day");

            return;
        }

        foreach ($expenditures as $expenditure){
            $total += $expenditure->totalAmount;
        }

        $this->view->total = $total;
        $this->view->recordName = $record->name;
        $this->view->expenditures = $expenditures;



    }

    /**
     * Displays the creation form
     */
//    public function newAction()
//    {
//
//        $this->view->form = new AddRecord();
//    }

    /**
     * Edits a record
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $record = Record::findFirstByid($id);
            if (!$record) {
                $this->flash->error("record was not found");

                $this->dispatcher->forward([
                    'controller' => "record",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $record->id;

            $this->tag->setDefault("id", $record->id);
            $this->tag->setDefault("name", $record->name);
            $this->tag->setDefault("total_spending", $record->total_spending);
            $this->tag->setDefault("day", $record->day);
            $this->tag->setDefault("user_id", $record->user_id);
            $this->tag->setDefault("week_id", $record->week_id);
            $this->tag->setDefault("month_id", $record->month_id);
            
        }
    }

    /**
     * Creates a new record
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'index'
            ]);

            return;
        }

        $record = new Record();
        $record->name = $this->request->getPost("name");
        $record->total_spending = $this->request->getPost("total_spending");
        $record->day = $this->request->getPost("day");
        $record->user_id = $this->request->getPost("user_id");
        $record->week_id = $this->request->getPost("week_id");
        $record->month_id = $this->request->getPost("month_id");
        

        if (!$record->save()) {
            foreach ($record->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("record was created successfully");

        $this->dispatcher->forward([
            'controller' => "record",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a record edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'index'
            ]);

            return;
        }
        else{

            try {
                $form = new AddRecord();

                if ($form->isValid($this->request->getPost())) {
                    $typeID = $this->request->getPost('expenses');
                    $amount = $this->request->getPost('amount');
                    $type = Expenses::findFirstById($typeID); //get the name of the option

                    $record = Record::findFirstById($this->persistent->recordId);

                    $week = Week::findFirst(['conditions' => 'name = :name: AND userID = :userId:'
                                            ,'bind' => ['name'=>$this->persistent->weekName,
                                             'userId' =>$this->persistent->userId ]]);

                    $weekBalance =(float) $week->totalAmount;
                    $prevAmount = (float)$record->totalAmount;
                    if($prevAmount ==null || $weekBalance==null){
                        $prevAmount = 0;
                        $weekBalance = 0;
                    }
                    $week->totalAmount = ($weekBalance) + $amount;
                    $record->totalAmount = ($prevAmount) + $amount;
                    $expenditure = new Expenditure(['type'=>$type->title,'totalAmount'=>$amount,
                                                      'recordId'=>$this->persistent->recordId]);
                    if($expenditure->save()){
                        $record->save();
                        $week->save();
                        $this->flash->success('new Expenditure For Today Added ');
                        $this->dispatcher->forward([
                            'controller' => 'record',
                            'action'  =>  'new'
                        ]);
                    }
                    else{
                        $this->flash->error('failed to add new item');
                        $this->response->redirect('record');
                    }
                }
                else{
                    $this->flash->error('Unable to add new Item ');
                    $this->dispatcher->forward([
                        'controller' => 'record',
                        'action'  =>  'new'
                    ]);
                }
            }catch(AuthException $e){
                $this->flash->error($e->getMessage());
            }
        }

    }

    /**
     * Deletes a record
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $record = Record::findFirstByid($id);
        if (!$record) {
            $this->flash->error("record was not found");

            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'index'
            ]);

            return;
        }

        //deleting a record deletes all expenditures attached to the file
        $RecordExpenditure = Expenditure::find(['conditions'=>'recordId = :recordId:','bind'=>
                                             ['recordId'=>$id]]);

        //get amount of money in record
        $amount = $record->totalAmount;
        //remove the amount of the record from the week
        $week = Week::findFirst(['conditions' => 'name = :name: AND userID = :userId:'
            ,'bind' => ['name'=>$this->persistent->weekName,
                'userId' =>$this->persistent->userId ]]);

        $weekBalance =(float) $week->totalAmount;
        if($weekBalance==null){
            $weekBalance = 0;
        }



        if (!$record->delete()) {

            foreach ($record->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'search'
            ]);

            return;
        }

        $week->totalAmount = $weekBalance - $amount;
        $week->save();
        //delete them here
        foreach ($RecordExpenditure as $expenditure){
            $expenditure->delete();
        }

        $this->flash->success("record was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "record",
            'action' => "index"
        ]);
    }



    /**
     * Deletes a record
     *
     * @param string $id
     */
    public function expendituredelAction($id)
    {
        $expenditure = Expenditure::findFirstByid($id);
        if (!$expenditure) {
            $this->flash->error("Expenditure was not found");

            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'new'
            ]);

            return;
        }

        //if  the delete is successful
        $amount = $expenditure->totalAmount;


        $record = Record::findFirstById($this->persistent->recordId);

        $week = Week::findFirst(['conditions' => 'name = :name: AND userID = :userId:'
            ,'bind' => ['name'=>$this->persistent->weekName,
                'userId' =>$this->persistent->userId ]]);

        $weekBalance =(float) $week->totalAmount;
        $prevAmount = (float)$record->totalAmount;
        if($prevAmount ==null || $weekBalance==null){
            $prevAmount = 0;
            $weekBalance = 0;
        }
        $week->totalAmount = ($weekBalance) - $amount;
        $record->totalAmount = ($prevAmount) - $amount;



        if (!$expenditure->delete()) {

            foreach ($expenditure->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "record",
                'action' => 'new'
            ]);

            return;
        }
        //save week and record
        $record->save();
        $week->save();

        $this->flash->success("record was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "record",
            'action' => "new"
        ]);
    }

}
