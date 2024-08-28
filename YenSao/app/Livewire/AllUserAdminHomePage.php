<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AllUserAdminHomePage extends Component
{
    public $AllUser;
    public $search;

    public function AddUser()
    {
        return redirect()->route('AddUserFromAdmin');   
    }
    public function UpdateUser(User $user)
    {
        return redirect()->route('UpdateUserFromAdmin',['id'=>$user->id]);
    }
    public function DeleteUser(User $user)
    {
        $user->delete();

    }
    public function render()
    {
        $this->AllUser = User::where('id','<>',auth()->user()->id)
                                ->where('name','like','%'.$this->search.'%')
                                ->get(); 
        return view('livewire.all-user-admin-home-page');
    }
}
