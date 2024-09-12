<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Chart extends Component
{
    public $product;
    public $test;
    public function mount()
    {
        $this->product = product::all();
    }
    public function productsUpdated()
    {
        $this->product= product::find(2);
        $this->dispatch('test',$this->product);
    }
    
    public function render()
    {
        return view('livewire.chart');
    }
}
