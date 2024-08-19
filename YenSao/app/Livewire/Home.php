<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\product;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public $post;
    public function render()
    {
        $this->post = Post::all();
        $this->products = product::all();
        return view('livewire.home');
    }
}
