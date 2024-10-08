<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProduct extends Component
{

    use WithFileUploads;

    #[Validate('required')]
    public $gmail; //THIS IS NAME
    #[Validate('required|')]
    public $name;//THIS IS PRICE
    #[Validate('required|min:3')]
    public $password;// THIS IS DESCRIPTION
    public $product;

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


    public function mount($id)
    {
      $this->product = product::find($id);
      $this->password = $this->product->description;
      $this->gmail = $this->product->name;
      $this->name = $this->product->price;
      $this->weight = $this->product->weight;
      $this->pack = $this->product->packaging;
      $this->origin = $this->product->origin;
      $this->expdate = $this->product->expirationdate;
    }

    public function Update()
    {
        $validator= $this->validate();
        $this->product->name = $this->gmail;
        $this->product->description = $this->password;
        $this->product->price = $this->name;
        if($this->image)
        {
		//dd($this->image);
            $validator['image'] = $this->image->store('product','public');
            $this->product->image = 'storage/'. $validator['image'];
        };
        $this->product->save();
        $this->reset();
        return redirect()->route('AdminHomePage');
        //dd($user->avatar_url);
    }
    public function render()
    {
        return view('livewire.update-product');
    }
}
