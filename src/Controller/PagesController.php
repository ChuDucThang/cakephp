<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Cart');
    }

    public function beforeFilter(Event $event){
        $this->Authentication->allowUnauthenticated(['home', 'viewcart','addcart','clear']);

    }
    /**

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function home()
    {
        $product = TableRegistry::get('Products')->find();
        $this->set(compact('product'));

    }

    public function addcart(){
        $this->loadModel('Products');
        $id = $this->request->data['id'];
        $product = $this->Products->get($id, [
                'contain' => []
            ]);
        $quantity = 1;
        if(empty($product)) {
                $this->Flash->error('Gio hang bi loi');
            } else {
                $this->Cart->addcart($id, $quantity);
                $this->Flash->success($product->name . ' has been added to the shopping cart');
                return $this->redirect(['action' => 'home']);
            }
    }

    public function viewcart(){
        $cart = $this->Cart->cart();
        $this->set(compact('cart'));
    }

    public function deletecart($id = null){
        $cart = $this->Cart->deletecart($id);
         if(!empty($cart)) {
            $this->Flash->error($cart['name'] . ' was removed from your shopping cart');
        }
        return $this->redirect(['action' => 'viewcart']);
    }

    public function clear(){
        $this->Cart->deleteall();
        $this->Flash->success('Xóa hết giỏ hàng');
        return $this->redirect(['action' => 'home']);
    }
}
