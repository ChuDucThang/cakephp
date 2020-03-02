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

		if ($this->request->is('post')) {
			$users = $this->Auth->identify();
			if ($users) {
				$this->Auth->setUser($users);
				return $this->redirect($this->Auth->redirectUrl());
			}

			$this->Flash->error('Your username or password is correct');
		}
		// $first = $this->Users->find('all')->order('Users.id DESC');
		// var_dump($users);

	}

	public function logout()
	{
	    $this->Authentication->logout();
	    return $this->redirect(['controller' => 'Login', 'action' => 'logout']);
	}

}