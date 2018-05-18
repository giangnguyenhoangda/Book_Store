<?php
namespace App;

use Session;

class Cart{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['qty']++;
		$storedItem['price'] = $item->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;

		$this->totalQty++;
		$this->totalPrice += $item->price;
	}

	public function remove($id){
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$this->totalQty -= $storedItem['qty'];
		$this->totalPrice -= $storedItem['item']->price * $storedItem['qty'];
		unset($this->items[$id]);

		Session::put('cart', $this);
	}

	public function decrease($id){
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['qty']--;
		$storedItem['price'] = $storedItem['item']->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;

		$this->totalQty -= 1;
		$this->totalPrice -= $storedItem['item']->price;

		Session::put('cart', $this);
	}

	public function increase($id){
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['qty']++;
		$storedItem['price'] = $storedItem['item']->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;

		$this->totalQty += 1;
		$this->totalPrice += $storedItem['item']->price;

		Session::put('cart', $this);
	}

	public function removeAll(){
		$this->items = null;
		$this->totalPrice = 0;
		$this->totalQty = 0;
	}
}

?>