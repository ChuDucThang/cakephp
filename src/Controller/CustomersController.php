<?php

namespace App\Controller;

use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class CustomersController extends AppController
{
	public function register()
	{
		if ($this->request->is('post')) {
			$customerTable = TableRegistry::get('Customers');
			$customer = $customerTable->newEntity();
			var_dump($customer);
		}
	}
	
}