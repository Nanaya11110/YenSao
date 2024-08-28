<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateUserFromAdmin extends Component
{

    use WithFileUploads;
    #[Validate('required:min:5|email')]
    public $gmail;
    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|min:3')]
    public $password;
    #[Validate('required')]    
    public $role;
    public $User;
    #[Validate('image')]
    public $image;
    public function mount($id)
    {
      $this->User = User::find($id);
      $this->role = $this->User->role;
      $this->name = $this->User->name;
      $this->password = $this->User->note;
      $this->gmail = $this->User->email;
    }

    public function update()
    {
        $user = $this->User;
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

    public function delete()
    {
        $this->User->delete();
        return redirect()->route('AllUserAdminPage');
    }

    public function render()
    {
        return view('livewire.update-user-from-admin');
    }
}
