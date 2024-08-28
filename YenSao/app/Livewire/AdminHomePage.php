<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\product;
use App\Models\User;
use Livewire\Component;

class AdminHomePage extends Component
{
    public $TotalUserCount;
    public $TotalProductCount;
    public $TotalPostCount;
    public $TotalProduct;
    public $search;



    public function AddProduct(product $product)
    {
        return redirect()->route('AddProduct');
    }
    public function UpdateProduct(product $product)
    {
        return redirect()->route('UpdateProduct',['id'=>$product->id]);
    }
    public function DeleteProduct(product $product)
    {
        $product->delete();
    }
    public function render()
    {
        $this->TotalPostCount = Post::count();
        $this->TotalUserCount = User::all()->count();
        $this->TotalProductCount = product::all()->count();
        $this->TotalProduct = product::where('name','like','%'.$this->search.'%')->get();
        return view('livewire.admin-home-page');
    }
}
