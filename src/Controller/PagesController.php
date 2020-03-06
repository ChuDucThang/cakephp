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

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
        $this->loadModel('Products');
        $this->loadModel('Orders');
        $this->loadModel('Ordersdetail');
    }

    public function beforeFilter(Event $event){
        $this->viewBuilder()->setLayout('default');
        $this->Authentication->allowUnauthenticated(['home', 'viewcart','addcart','updatecart','deletecart','clear','checkout']);
    }
    /**


    public function beforeFilter(Event $event){
        $this->Authentication->allowUnauthenticated(['home']);
    }

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
        $id = $this->request->data['id'];
        $product = $this->Products->get($id, [
                'contain' => []
            ]);
        $quantity = 1;;
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
        debug($cart['Orders']);
        $this->set(compact('cart'));
    }

    public function deletecart($id = null){
        $cart = $this->Cart->deletecart($id);
         if(!empty($cart)) {
            $this->Flash->error($cart->name . ' was removed from your shopping cart');
        }
        return $this->redirect(['action' => 'viewcart']);
    }

    public function updatecart(){
        $id = $this->request->data['id'];
        $product = $this->Products->get($id,[
            'contain' => []
        ]);
        $quantity = isset($this->request->data['quantity']) ? $this->request->data['quantity'] : 1;
        $this->Cart->updatecart($id,$quantity);
        $this->Flash->success($product->name . ' updated quantity');
        return $this->redirect(['action' => 'viewcart']);
    }

    public function clear(){
        $this->Cart->deleteall();
        $this->Flash->success('Xóa hết giỏ hàng');
        return $this->redirect(['action' => 'home']);
    }

    public function checkout(){
        $this->viewBuilder()->setLayout('checkout');
        // view product
        $cart = $this->Cart->cart();
        $this->set(compact('cart'));

        // // add order
        $order = $this->Orders->newEntity();
        // $order = $this->Ordersdetail->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            $orderTable = TableRegistry::get('Ordersdetail');
            $orderdetail = $orderTable->newEntity();

               // foreach ($cart['Ordersdetail'] as $key => $cart) {
               //     $myproduct_id = $cart['product_id'];
               //     $myorder_id  = 1;
               //     $myquantity = $cart['quantity'];
               //     $myprice = $cart['price'];
                
               // }
                // debug($orderdetail);
            $orderdetail->product_id =7 ;
            $orderdetail->order_id = 10;
            $orderdetail->quantity = 40000;
            $orderdetail->price = 40000;
            $orderdetail->created_at = date('Y-m-d',time());
            $orderdetail->updated_at = date('Y-m-d',time());

                
            if ($this->Orders->save($order)) {
                // $this->Flash->success('Order successfull.');
                // return $this->redirect(['action' => 'home']);
                if ($orderTable->save($orderdetail)) {
                    $this->Flash->success('Order successfull.');
                    $this->redirect(['action' => 'home']);
            //             $orderdetail->product_id = 1;
            //             $orderdetail->order_id = $order->id;
            //             $orderdetail->quantity = 40000;
            //             $orderdetail->created_at = date('Y-m-d',time());
            //             $orderdetail->updated_at = date('Y-m-d',time());
            //          $this->Flash->success('Order successfull.');
            //         return $this->redirect(['action' => 'home']);  
                }else{
                    $this->Flash->error('Orderdetail fail.'); 
                }
            //           $this->Flash->error('Order fail.');     
            // }else{
            }else{
                $this->Flash->error('Order fail.');
            }
        }
        $this->set(compact('order'));
    }
}
