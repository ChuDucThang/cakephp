<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Dashboard Controller
 *
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    public function beforeFilter(Event $event){
        $this->viewBuilder()->setLayout('dashboard');

    }

    public function index()
    {
        
    }

    public function add(){

    }

}
