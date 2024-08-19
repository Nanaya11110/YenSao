<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class AllProduct extends Component
{
    public $id;
    public $products;

    public function mount()
    {
        $this->products = product::all();
    }
    public function render()
    {
        return view('livewire.allProduct');
    }
}
