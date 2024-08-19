<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public function render()
    {
        $this->products = product::take(3)->get();
        return view('livewire.home');
    }
}
