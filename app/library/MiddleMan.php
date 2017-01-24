<?php
namespace login;
use Phalcon\Mvc\User\Component;

/**
 * Created by PhpStorm.
 * User: aanu.oyeyemi
 * Date: 19/01/2017
 * Time: 7:26 PM
 */
class MiddleMan extends Component

{



    public  function getCurrentUserId(){
        $session= $this->auth->getIdentity();
        $id = $session['id'];
        return $id;
    }


    public function handleDate(){
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
            'bind' =>['userId' => getCurrentUserId()]
        ]);

        if($weekDayno == 1 || $weekIndex==0){
            //assume the weekday starts with index 1,
            //create a new week
            $week = new Week(['name' => ('week '.($weekIndex+1)),'month'=> $monthName,'userID'=>$userId,'monthId'=>$monthIndex,'year' => $year]);
            if($week->save()){
                $weekIndex +=1;
            }

        }

        //check if the last record in the db has currentDate date
        $record = Record::find(['conditions' => 'name = :name: AND userId = :userId:',
            'bind'=>['userId'=>$userId,'name'=>$recordTitle]]);

        $recordId = $record[0]->id;

        if(count($record)==0){
            $record = new Record();
            $record->name = $recordTitle;
            $record->userId = $userId;
            $record->day = $weekDay;
            $record->weekId = $weekIndex;
            $record->month = $monthName;
            $record->save();
            $recordId +=1;
        }

    }

}