<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * 
 */
class CartComponent extends Component 
{
	public function getcart(){
		// $this->request->session()->write('Cart.name','San pham 1');		
		// $this->request->session()->write('Cart.quantity','2');		
		// $this->request->session()->write('Cart.price','96000');		
		// $this->request->session()->write('Cart.name','San pham 2');		
		// $this->request->session()->write('Cart.quantity','2');		
		// $this->request->session()->write('Cart.price','9600077');	
		return $this->request->session()->read('Cart');

	}

	public function cart()
    {
        return $this->getcart();
        // $quantity = 0;
        // $subtotal = 0;
        // $total = 0;
        // $order_item_count = 0;
        // // $order = $shop['Order'];
        // if (count($cart['Orders']) > 0) {
        //     foreach ($cart['Orderproducts'] as $item) {
        //         $quantity += $item['quantity'];
        //         $subtotal += $item['subtotal'];
        //         $total += $item['subtotal'];
        //         $order_item_count++;
        //     }
        //     $order['order_item_count'] = $order_item_count;
        //     $order['quantity'] = $quantity;
        //     $order['subtotal'] = sprintf('%01.2f', $subtotal);
        //     $order['total'] = sprintf('%01.2f', $total);

        //     $this->request->session()->write('Cart.Order', $order);
        //     return true;
        // }
        // else {
        //     $this->clear();
        //     return false;
        // }
    }

	public function addcart($id, $quantity){
		$controller = $this->_registry->getController();
		if(!is_numeric($quantity) || $quantity < 1) {
            $quantity = 1;
        }
        $quantity = abs($quantity);

        $data = [];

       if($data){
       		$data['id']['quantity'] += 1;
       }else{
       		$product = $controller->Products->get($id, [
                'contain' => []
	            ]);
	        if($product){
	        	$price = $product->price;
	        }

	       	$data = [
	        	'product_id' => $product->id,
	        	'name' => $product->name,
	        	'image' => $product->image,
	        	'price' => sprintf('%01.2f', $price),
	        	'quantity' => $quantity,
	        	'total' => sprintf('%01.2f', $price * $quantity),
	        	];
	        $this->request->session()->write('Cart.Orders.' .$id, $data);
	        $this->cart();
       }
	}

	public function updatecart(){

	}

	public function deletecart($id){
		if($this->request->session()->read('Cart.Orders.' . $id)) {
            $product = $this->request->session()->read('Cart.Orders.' . $id);
            $this->request->session()->delete('Cart.Orders.' . $id);
            $this->cart();
            return $product;
        }
        return false;
	}

	public function deleteall(){
		return $this->request->session()->destroy('Cart');
	}
}