<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddUserFromAdmin extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $gmail; //THIS IS NAME
    #[Validate('required|')]
    public $name;//THIS IS PRICE
    #[Validate('required|min:3')]
    public $password;// THIS IS DESCRIPTION
    public $role;
    public function mount()
    {
        $this->role ="User";
    }
    #[Validate('image')]
    public $image;

    public function Add()
    {
        $user =  new User();
        $user->email = $this->gmail;
        $user->name = $this->name;
        $user->password = Hash::make($this->password);
        $user->note = $this->password;
        $user->role = $this->role;
        if($this->image)
        {
		//dd($this->image);
            $validator['image'] = $this->image->store('user','public');
            $user->avatar_url = 'storage/'. $validator['image'];
        };
        $this->reset();
        if ($user->save()) return redirect()->route('AllUserAdminPage');
        else return redirect()->back();
        //dd($user->avatar_url);
    }
    public function render()
    {
        return view('livewire.add-user-from-admin');
    }
}
