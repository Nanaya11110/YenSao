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
    
    #[Validate('required | date | after:today')]
    public $expdate; //THIS IS NAME
    
    #[Validate('required')]
    public $pack; //THIS IS NAME
    
    #[Validate('required')]
    public $weight; //THIS IS NAME
    
    #[Validate('required')]
    public $origin; 

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
        $product->weight = $this->weight;
        $product->expirationdate = $this->expdate;
        $product->packaging = $this->pack;
        $product->origin = $this->origin;
        $validator['image'] = $this->image->store('product','public');
        $product->image = 'storage/'. $validator['image'];
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
