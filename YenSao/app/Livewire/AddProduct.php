<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $gmail; //THIS IS NAME
    #[Validate('required|')]
    public $name;//THIS IS PRICE
    #[Validate('required|min:3')]
    public $password;// THIS IS DESCRIPTION

    #[Validate('image')]
    public $image;

    public function Add()
    {
        $validator= $this->validate();
        $description = $this->password;
        $name = $this->gmail;
        $price = $this->name;
        $product = new product();
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $validator['image'] = $this->image->store('storage/product','public');
        $product->image = $validator['image'];
        $product->category = 'Ni25';
        $product->save();
        //dd($user->avatar_url);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.add-product');
    }
}
