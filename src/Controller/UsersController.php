<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{

     public function index(){
         
     }

     // Fetch all records
     public function fetchAllUsers(){

          $users = $this->getTableLocator()->get('Users');
          $query = $users->find('all')->order(['id' => 'ASC']);
          $usersList = $query->toArray();

          echo json_encode($usersList);
          die;
     }

     // Fetch record by id
     public function fetchUserById(){
          // POST value
          $userid = $this->request->getData()['userid'];

          // Fetch record
          $users = $this->getTableLocator()->get('Users');
          $query = $users->find('all')
               ->where(['id ' => $userid]);
          $userList = $query->toArray();

          echo json_encode($userList);
          die;
     }

}