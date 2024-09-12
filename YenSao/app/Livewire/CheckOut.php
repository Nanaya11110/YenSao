<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\ship;
use App\Rules\CardNumberFormat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CheckOut extends Component
{
    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|min:3')]
    public $phone;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:9')]
    public $CardNumber;
    #[Validate('required|min:3')]
    public $ExpirationDate;
    #[Validate('required|')]
    public $method = 'Card';
    #[Validate('required|')]
    public $address;
    public function shipp(Request $request)
    {
        $cart = Cart::where('user_id',auth()->user()->id)->get();        
        foreach ($cart as $cartItem)
        {
                $id[] = $cartItem->product_id;
                $quantity[] = $cartItem->quantity;
        }
        $id = implode(',',$id);
        $quantity = implode(',',$quantity);
        $formData = [
            'id' => $id,
            'quantity' => $quantity,
        ];
        $formData = json_encode($formData);
        $totalCost = Cart::selectRaw('SUM(quantity * price) AS total')
        ->where('user_id',auth()->user()->id)
        ->value('total');
        // dd($totalCost);
         $this->validate();
        $ship = new ship();
        $ship->name = $this->name;
        $ship->email = $this->email;
        $ship->phone = $this->phone;
        $ship->user_id = auth()->user()->id;
        $ship->method = $this->method;
        $ship->status = 0;
        $ship->product = $formData;
        $ship->address = $this->address;
        $ship->cost = $totalCost;
        $ship->save();
        $this->reset();
        $cart = Cart::where('user_id',auth()->user()->id);
        $cart->delete();
        return redirect()->route('Home');
    }

    public function CheckOut()
    {
        $Cart = Cart::where('user_id', auth()->user()->id)->delete();
    }
    public function render()
    {
        return view('livewire.check-out');
    }
}
