<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Rules\CardNumberFormat;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CheckOut extends Component
{

    #[Validate('required|min:3')] 
    public $name;
    #[Validate('required|email')] 
    public $email;
    #[Validate('required|min:9')] 
    public $CardNumber;
    #[Validate('required|min:3')] 
    public $ExpirationDate;
    #[Validate('required|min:3')] 
    public $CVV;

   
    public function CheckOut()
    {
        $Cart = Cart::where('user_id',auth()->user()->id)->delete();
    }
    public function render()
    {
        return view('livewire.check-out');
    }
}
