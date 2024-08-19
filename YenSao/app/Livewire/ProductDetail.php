<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Log\Logger;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $pick = 1;

    public function mount($id)
    {
        $this->product = product::find($id);
    }

   
    public function AddToCart()
    {
       $CartItem = Cart::where('user_id',auth()->user()->id)
                        ->where('product_id',$this->product->id)
                        ->first();
       $item = new Cart();
       //CHECK IF THERE IS A ITEM IN THE CART OR NOT
       if ($CartItem) 
       {
        $CartItem->quantity++;
        $CartItem->save();
       }
       else 
       {
        $item->user_id = auth()->user()->id;
        $item->product_id = $this->product->id;
        $item->quantity = 1;
        $item->price = $this->product->price;
        $item->save();
       }
       
    }

    public function CheckOut()
    {
        return redirect()->route('CheckOut');
    }
    public function render()
    {
        return view('livewire.productDetail');
    }
}
