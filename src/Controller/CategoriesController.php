<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// use Cake\ORM\TableRegistry; 
/**
 * 
 */
class CategoriesController extends AppController
{
	 public function beforeFilter(Event $event){
        $this->viewBuilder()->setLayout('dashboard');

    }

	public function index(){
		$cats = $this->paginate($this->Categories);
		$this->set(compact('cats'));

	}

	public function view($id = null){

        $cat = $this->Categories->get($id, [
            'contain' => [],
        ]);

        $this->set('cat', $cat);
	}

	public function add(){
		$cat = $this->Categories->newEntity();
		if ($this->request->is('post')) {
			$cat = $this->Categories->patchEntity($cat, $this->request->getData());
			if ($this->Categories->save($cat)) {
				$this->Flash->success(__('The category saved.'));
				return $this->redirect(['action' => 'index']);
			}else{
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null)
    {
        $cat = $this->Categories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cat = $this->Categories->patchEntity($cat, $this->request->getData());
            if ($this->Categories->save($cat)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('cat'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cat = $this->Categories->get($id);
        if ($this->Categories->delete($cat)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}