<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
// use Cake\Event\EventInterface;
// use Cake\Event\Event;
/**
 * 
 */
class LoginController extends AppController
{

	// public function beforeFilter(Event $event){
	//     $this->viewBuilder()->setLayout('login');
 //        // debug($event);
 //        // exit();
 //    }
	
	public function index(){
		$this->viewBuilder()->setLayout('login');

		 // $this->loadModel('Users');
		$users = TableRegistry::get('Users');
		// $first = $this->Users->find('all')->order('Users.id DESC');
		// var_dump($users);

	}

}