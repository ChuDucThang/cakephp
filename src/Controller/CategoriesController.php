<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry; 
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
		$validator = new Validator();
		$cat = $this->Categories->newEntity();
		if ($this->request->is('post')) {
			$cat = $this->Categories->patchEntity($cat, $this->request->getData());
			if ($cat->errors()) {
				$validator = [
					'name' => $cat->errors('name'),
					'status' => $cat->errors('status'),
				];
				print_r($validator);
			}else{
				$this->Categories->save($cat);
				$this->Flash->success('The category has been saved.');
				return $this->redirect(['action' => 'index']);
			}
		}
		$this->set('validator', $validator); 
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
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('cat'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cat = $this->Categories->get($id);
        if ($this->Categories->delete($cat)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}