<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\product;
use App\Models\ship;
use App\Models\User;
use Illuminate\Support\Collection as Collection1;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminHomePage extends Component
{
    public $TotalUserCount;
    public $TotalProductCount;
    public $TotalPostCount;
    public $TotalProduct;
    public $search;
    public $ship;
    public $totalproductclick;
    public $editable;

    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:9')]
    public $phone;
    #[Validate('required')]
    public $address;
    #[Validate('required')]
    public $cost;
    #[Validate('required')]
    public $status;
    public $productDetail;
    public function mount()
    {
        $this->editable = 0;
    }

    public function EditAble(ship $ship)
    {
        if ($this->editable == $ship->id) {
            $this->editable = 0;
            return;
        }
        $this->editable = $ship->id;
        $this->name = $ship->name;
        $this->email = $ship->email;
        $this->phone = $ship->phone;
        $this->cost = $ship->cost;
        $this->address = $ship->address;
        $this->status = $ship->status;
        $ship->product = json_decode($ship->product, true);
        $productId = explode(',', $ship->product['id']);
        $quantity = collect(explode(',', $ship->product['quantity']));
        $productName = collect(product::whereIn('id', $productId)->get('name')->pluck('name')->toArray());
        $combined = $productName->zip($quantity)->map(function ($item) {
            return [
                'name' => $item[0],  
                'quantity' => $item[1]
            ];
        });
        $ship->productDetail = $combined;
        $this->productDetail = $ship->productDetail;
    }
    public function UpdateShip(ship $ship)
    {
        $this->validate();
        $ship->name = $this->name;
        $ship->email = $this->email;
        $ship->phone = $this->phone;
        $ship->cost = $this->cost;
        $ship->address = $this->address;
        $ship->status = (int) $this->status;
        $ship->save();
        $this->reset();
        $this->editable = 0;
    }

    public function DeleteShip(ship $ship)
    {
        $ship->delete();
    }
    public function render()
    {
        $this->ship = ship::all();
        foreach ($this->ship as $ship)
        {
            $ship->product = json_decode($ship->product, true);
            $productId = explode(',', $ship->product['id']);
            $quantity = collect(explode(',', $ship->product['quantity']));
            $productName = collect(product::whereIn('id', $productId)->get('name')->pluck('name')->toArray());
            $combined = $productName->zip($quantity)->map(function ($item) {
                return [
                    'name' => $item[0],  
                    'quantity' => $item[1]
                ];
            });
            $ship->productDetail = $combined;
        }
        $this->TotalPostCount = Post::count();
        $this->TotalUserCount = User::all()->count();
        $this->TotalProductCount = product::all()->count();

        $this->TotalProduct = product::orderBy('click', 'DESC')->take(4)->get();
        $this->totalproductclick = $this->TotalProduct->sum('click');

        return view('livewire.admin-home-page');
    }
}
