<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartItem;
class Cart extends Component
{
    public $CartItem;
    public $TotalPrice = 0;
    public function RemoveFromCart(CartItem $cartItem)
    {
        
        $cartItem->delete();
    }

    public function DecItem(CartItem $cartItem)
    {
            $cartItem->quantity -=1;
            $cartItem->save();
    }

     public function AddToCart(CartItem $cartItem)
    {
       $cartItem->quantity++;
       $cartItem->save();
    }

    public function checkout()
    {
        return redirect()->route('CheckOut');
    }
    public function render()
    {
        $this->CartItem = CartItem::where('user_id', auth()->user()->id)->get();
        return view('livewire.cart');
    }
}
