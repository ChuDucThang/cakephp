<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * 
 */
class CartComponent extends Component 
{

	public function getcart(){
		// $this->request->session()->write('Cart.quantity','2');		
		// $this->request->session()->write('Cart.price','96000');		
		// $this->request->session()->write('Cart.name','San pham 2');		
		// $this->request->session()->write('Cart.quantity','2');		
		// $this->request->session()->write('Cart.price','9600077');	
		return $this->request->session()->read('Cart');
		// return $this->request->session()->destroy('Cart');

	}

	public function cart()
    {
        // return $this->getcart();
        $cart = $this->getcart();
        $quantity = 0;
        $price = 0;
        $total = 0;
        $order_item_count = 0;
        $order = [];
        if ($cart['Ordersdetail']) {
            foreach ($cart['Ordersdetail'] as $key => $item) {
                $quantity += $item['quantity'];
                $total += $item['total'];
                $order_item_count++;
            }
            $order['order_item_count'] = $order_item_count;
            $order['quantity'] = $quantity;
            $order['total'] = sprintf('%01.2f', $total);

            $this->request->session()->write('Cart.Orders', $order);
            return $this->getcart();
        }
        else {
            return $this->deleteall();
            // return false;
        }
    }

	public function addcart($id, $quantity){
		$controller = $this->_registry->getController();
		if(!is_numeric($quantity) || $quantity < 1) {
            $quantity = 1;
        }
        if ($quantity > 99) {
        	$quantity = 99;
        }
        $quantity = abs($quantity);
		
        $data = [];
        if($this->request->session()->read('Cart.Ordersdetail.' .$id)) {
			$data = $this->request->session()->read('Cart.Ordersdetail.' .$id);
			$data['quantity'] = $data['quantity'] + 1;
			$data['total'] = $data['quantity'] * $data['price'];
			// dd($data);
			$this->request->session()->write('Cart.Ordersdetail.' .$id, $data);
			// dd($this->cart());
		}else{
			$product = $controller->Products->get($id, [
                'contain' => []
	            ]);

	       	$data = [
	        	'product_id' => $product->id,
	        	'name' => $product->name,
	        	'image' => $product->image,
	        	'price' => sprintf('%01.2f', $product->price),
	        	'quantity' => $quantity,
	        	'total' => sprintf('%01.2f', $product->price * $quantity),
	        	];
	        $this->request->session()->write('Cart.Ordersdetail.' .$id, $data);
		}
       $this->cart();
	}

	public function updatecart($id,$quantity){
		if(!is_numeric($quantity) || $quantity < 1) {
            $quantity = 1;
        }
        if ($quantity > 99) {
        	$quantity = 99;
        }
        $quantity = abs($quantity);
		if($this->request->session()->read('Cart.Ordersdetail.' .$id)) {
			$data = $this->request->session()->read('Cart.Ordersdetail.' .$id);
			$data['quantity'] = $quantity;
			$data['total'] = $quantity * $data['price'];
			$this->request->session()->write('Cart.Ordersdetail.' .$id, $data);
		}
		$this->cart();
	}

	public function deletecart($id){
		if($this->request->session()->read('Cart.Ordersdetail.'. $id)) {
            $product = $this->request->session()->read('Cart.Ordersdetail.' . $id);
            $this->request->session()->delete('Cart.Ordersdetail.' . $id);
            $this->cart();
            return $product;
        }
        return false;
	}

	public function deleteall(){
		return $this->request->session()->destroy('Cart');
	}
}