<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProdcutAdminPage extends Component
{
    use WithPagination;
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
        $products = Product::where('name', 'like', '%' . $this->search . '%')->simplePaginate(5);

        return view('livewire.all-prodcut-admin-page', [
            'TotalProduct' => $products,
        ]);
    }
}
