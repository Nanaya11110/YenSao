<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = product::find($id);
    }
    public function render()
    {
        return view('livewire.productDetail');
    }
}
