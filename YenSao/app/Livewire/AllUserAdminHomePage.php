<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AllUserAdminHomePage extends Component
{
    use WithPagination;
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
   
        $AllUser = User::where('id','<>',auth()->user()->id)
        ->where('name','like','%'.$this->search.'%')
        ->simplePaginate(5); 
        return view('livewire.all-user-admin-home-page',['AllUser'=>$AllUser]);
    }
}
